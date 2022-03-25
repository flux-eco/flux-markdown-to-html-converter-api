<?php

namespace FluxMarkdownToHtmlConverterApi\Channel\Converter\Converter;

use FluxMarkdownToHtmlConverterApi\Adapter\Config\ColorConfigDto;
use FluxMarkdownToHtmlConverterApi\Channel\Converter\Converter\Color\ColorExtension;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;

class CustomExtension implements ExtensionInterface
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
        $environment->addExtension(ColorExtension::new(
            $this->color_config
        ));
    }
}
