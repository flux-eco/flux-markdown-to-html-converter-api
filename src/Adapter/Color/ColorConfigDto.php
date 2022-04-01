<?php

namespace FluxMarkdownToHtmlConverterApi\Adapter\Color;

class ColorConfigDto
{

    /**
     * @param string[] $colors
     */
    private function __construct(
        public readonly array $colors
    ) {

    }


    /**
     * @param string[]|null $colors
     */
    public static function new(
        ?array $colors = null
    ) : static {
        return new static(
            $colors ?? []
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
            $colors
        );
    }
}
