ARG FLUX_AUTOLOAD_API_IMAGE=docker-registry.fluxpublisher.ch/flux-autoload/api
ARG FLUX_NAMESPACE_CHANGER_IMAGE=docker-registry.fluxpublisher.ch/flux-namespace-changer

FROM $FLUX_AUTOLOAD_API_IMAGE:v2022-06-22-1 AS flux_autoload_api

FROM composer:latest AS composer

RUN (mkdir -p /code/commonmark && cd /code/commonmark && composer require league/commonmark:2.3.3 --ignore-platform-reqs)

FROM $FLUX_NAMESPACE_CHANGER_IMAGE:v2022-06-23-1 AS build_namespaces

COPY --from=flux_autoload_api /flux-autoload-api /code/flux-autoload-api
RUN change-namespace /code/flux-autoload-api FluxAutoloadApi FluxMarkdownToHtmlConverterApi\\Libs\\FluxAutoloadApi

FROM composer:latest AS build

COPY --from=build_namespaces /code/flux-autoload-api /build/flux-markdown-to-html-converter-api/libs/flux-autoload-api
COPY --from=composer /code/commonmark /build/flux-markdown-to-html-converter-api/libs/commonmark
COPY . /build/flux-markdown-to-html-converter-api

RUN (cd /build && tar -czf flux-markdown-to-html-converter-api.tar.gz flux-markdown-to-html-converter-api)

FROM scratch

LABEL org.opencontainers.image.source="https://github.com/flux-eco/flux-markdown-to-html-converter-api"
LABEL maintainer="fluxlabs <support@fluxlabs.ch> (https://fluxlabs.ch)"
LABEL flux-docker-registry-rest-api-build-path="/flux-markdown-to-html-converter-api.tar.gz"

COPY --from=build /build /

ARG COMMIT_SHA
LABEL org.opencontainers.image.revision="$COMMIT_SHA"
