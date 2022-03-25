<?php

namespace FluxMarkdownToHtmlConverterApi\Adapter\Api;

class MarkdownDto
{

    private function __construct(
        public readonly string $markdown
    ) {

    }


    public static function new(
        string $markdown
    ) : static {
        return new static(
            $markdown
        );
    }


    public static function newFromData(
        object $data
    ) : static {
        return static::new(
            $data->markdown
        );
    }
}
