<?php

namespace FluxMarkdownToHtmlConverterApi\Channel\Converter\Command;

use FluxMarkdownToHtmlConverterApi\Adapter\Api\HtmlDto;
use FluxMarkdownToHtmlConverterApi\Adapter\Api\MarkdownDto;
use FluxMarkdownToHtmlConverterApi\Adapter\Config\ColorConfigDto;
use FluxMarkdownToHtmlConverterApi\Channel\Converter\Converter\CustomConverter;

class ConvertCommand
{

    private function __construct(
        private readonly ColorConfigDto $color_config
    ) {

    }


    public static function new(
        ColorConfigDto $color_config
    ) : static {
        return new static(
            $color_config
        );
    }


    public function convert(MarkdownDto $markdown) : HtmlDto
    {
        return HtmlDto::new(
            CustomConverter::new(
                $this->color_config
            )
                ->convert($markdown->markdown)->getContent()
        );
    }


    public function convertMultiple(object $markdowns) : object
    {
        $htmls = [];

        foreach ($markdowns as $id => $markdown) {
            $htmls[$id] = $this->convert(
                $markdown
            );
        }

        return (object) $htmls;
    }
}
