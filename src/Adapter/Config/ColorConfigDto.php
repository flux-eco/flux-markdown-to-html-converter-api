<?php

namespace FluxMarkdownToHtmlConverterApi\Adapter\Config;

class ColorConfigDto
{

    private function __construct(
        public readonly object $colors
    ) {

    }


    public static function new(
        ?object $colors = null
    ) : static {
        return new static(
            $colors ?? (object) []
        );
    }


    public static function newFromEnv() : static
    {
        $colors = [];
        foreach ($_ENV as $key => $value) {
            if (!str_starts_with($key, "FLUX_MARKDOWN_TO_HTML_CONVERTER_API_COLOR_")) {
                continue;
            }

            $colors[strtolower(substr($key, 42))] = $value;
        }

        return static::new(
            (object) $colors
        );
    }
}
