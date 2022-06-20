ARG FLUX_AUTOLOAD_API_IMAGE=docker-registry.fluxpublisher.ch/flux-autoload/api
ARG FLUX_NAMESPACE_CHANGER_IMAGE=docker-registry.fluxpublisher.ch/flux-namespace-changer

FROM $FLUX_AUTOLOAD_API_IMAGE:latest AS flux_autoload_api

FROM composer:latest AS composer

RUN (mkdir -p /code/commonmark && cd /code/commonmark && composer require league/commonmark --ignore-platform-reqs)

FROM $FLUX_NAMESPACE_CHANGER_IMAGE:latest AS build_namespaces

COPY --from=flux_autoload_api /flux-autoload-api /code/flux-autoload-api
RUN change-namespace /code/flux-autoload-api FluxAutoloadApi FluxMarkdownToHtmlConverterApi\\Libs\\FluxAutoloadApi

FROM composer:latest AS build

COPY --from=build_namespaces /code/flux-autoload-api /flux-markdown-to-html-converter-api/libs/flux-autoload-api
COPY --from=composer /code/commonmark /flux-markdown-to-html-converter-api/libs/commonmark
COPY . /flux-markdown-to-html-converter-api

FROM scratch

LABEL org.opencontainers.image.source="https://github.com/flux-eco/flux-markdown-to-html-converter-api"
LABEL maintainer="fluxlabs <support@fluxlabs.ch> (https://fluxlabs.ch)"

COPY --from=build /flux-markdown-to-html-converter-api /flux-markdown-to-html-converter-api

ARG COMMIT_SHA
LABEL org.opencontainers.image.revision="$COMMIT_SHA"
