<?php

namespace FluxMarkdownToHtmlConverterApi;

require_once __DIR__ . "/../libs/flux-autoload-api/autoload.php";

use FluxMarkdownToHtmlConverterApi\Libs\FluxAutoloadApi\Adapter\Autoload\Psr4Autoload;
use FluxMarkdownToHtmlConverterApi\Libs\FluxAutoloadApi\Adapter\Checker\PhpVersionChecker;

PhpVersionChecker::new(
    ">=8.2"
)
    ->checkAndDie(
        __NAMESPACE__
    );

Psr4Autoload::new(
    [
        __NAMESPACE__ => __DIR__
    ]
)
    ->autoload();

require_once __DIR__ . "/../libs/commonmark/vendor/autoload.php";
