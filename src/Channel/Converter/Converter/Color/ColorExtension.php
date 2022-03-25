<?php

namespace FluxMarkdownToHtmlConverterApi\Channel\Converter\Converter\Color;

use FluxMarkdownToHtmlConverterApi\Adapter\Config\ColorConfigDto;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;

class ColorExtension implements ExtensionInterface
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


    public function register(EnvironmentBuilderInterface $environment) : void
    {
        $environment->addInlineParser(ColorParser::new());
        $environment->addRenderer(ColorNode::class, ColorRenderer::new(
            $this->color_config
        ));
    }
}
