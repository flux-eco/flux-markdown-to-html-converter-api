FROM composer:latest AS build

RUN (mkdir -p /flux-namespace-changer && cd /flux-namespace-changer && wget -O - https://github.com/fluxfw/flux-namespace-changer/releases/download/v2022-07-12-1/flux-namespace-changer-v2022-07-12-1-build.tar.gz | tar -xz --strip-components=1)

RUN (mkdir -p /build/flux-markdown-to-html-converter-api/libs/commonmark && cd /build/flux-markdown-to-html-converter-api/libs/commonmark && composer require league/commonmark:2.3.3 --ignore-platform-reqs)

RUN (mkdir -p /build/flux-markdown-to-html-converter-api/libs/flux-autoload-api && cd /build/flux-markdown-to-html-converter-api/libs/flux-autoload-api && wget -O - https://github.com/fluxfw/flux-autoload-api/releases/download/v2022-07-12-1/flux-autoload-api-v2022-07-12-1-build.tar.gz | tar -xz --strip-components=1 && /flux-namespace-changer/bin/change-namespace.php . FluxAutoloadApi FluxMarkdownToHtmlConverterApi\\Libs\\FluxAutoloadApi)

COPY . /build/flux-markdown-to-html-converter-api

FROM scratch

COPY --from=build /build /
