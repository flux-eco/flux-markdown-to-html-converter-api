<?php

namespace FluxMarkdownToHtmlConverterApi\Channel\Converter\Port;

use FluxMarkdownToHtmlConverterApi\Adapter\Color\ColorConfigDto;
use FluxMarkdownToHtmlConverterApi\Adapter\Html\HtmlDto;
use FluxMarkdownToHtmlConverterApi\Adapter\Markdown\MarkdownDto;
use FluxMarkdownToHtmlConverterApi\Channel\Converter\Command\ConvertCommand;

class ConverterService
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
        return ConvertCommand::new(
            $this->color_config
        )
            ->convert(
                $markdown
            );
    }


    /**
     * @param MarkdownDto[] $markdowns
     *
     * @return HtmlDto[]
     */
    public function convertMultiple(array $markdowns) : array
    {
        return ConvertCommand::new(
            $this->color_config
        )
            ->convertMultiple(
                $markdowns
            );
    }
}
