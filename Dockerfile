ARG COMMONMARK_SOURCE_URL=https://github.com/thephpleague/commonmark/archive/main.tar.gz
ARG COMPOSER_IMAGE=composer:latest
ARG FLUX_AUTOLOAD_API_IMAGE=docker-registry.fluxpublisher.ch/flux-autoload/api:latest
ARG FLUX_NAMESPACE_CHANGER_IMAGE=docker-registry.fluxpublisher.ch/flux-namespace-changer:latest

FROM $FLUX_AUTOLOAD_API_IMAGE AS flux_autoload_api
FROM $FLUX_NAMESPACE_CHANGER_IMAGE AS flux_autoload_api_build
ENV FLUX_NAMESPACE_CHANGER_FROM_NAMESPACE FluxAutoloadApi
ENV FLUX_NAMESPACE_CHANGER_TO_NAMESPACE FluxMarkdownToHtmlConverterApi\\Libs\\FluxAutoloadApi
COPY --from=flux_autoload_api /flux-autoload-api /code
RUN $FLUX_NAMESPACE_CHANGER_BIN

FROM $COMPOSER_IMAGE AS build
ARG COMMONMARK_SOURCE_URL

COPY --from=flux_autoload_api_build /code /flux-markdown-to-html-converter-api/libs/flux-autoload-api
RUN (mkdir -p /flux-markdown-to-html-converter-api/libs/commonmark && cd /flux-markdown-to-html-converter-api/libs/commonmark && wget -O - $COMMONMARK_SOURCE_URL | tar -xz --strip-components=1 && composer install --no-dev)
COPY . /flux-markdown-to-html-converter-api

FROM scratch

LABEL org.opencontainers.image.source="https://github.com/flux-eco/flux-markdown-to-html-converter-api"
LABEL maintainer="fluxlabs <support@fluxlabs.ch> (https://fluxlabs.ch)"

COPY --from=build /flux-markdown-to-html-converter-api /flux-markdown-to-html-converter-api
