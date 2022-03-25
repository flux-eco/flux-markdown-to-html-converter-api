<?php

namespace FluxMarkdownToHtmlConverterApi\Adapter\Api;

class HtmlDto
{

    private function __construct(
        public readonly string $html
    ) {

    }


    public static function new(
        string $html
    ) : static {
        return new static(
            $html
        );
    }
}
