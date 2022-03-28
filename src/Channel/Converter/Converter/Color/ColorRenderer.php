<?php

namespace FluxMarkdownToHtmlConverterApi\Channel\Converter\Converter\Color;

use FluxMarkdownToHtmlConverterApi\Adapter\Color\ColorConfigDto;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use Stringable;

class ColorRenderer implements NodeRendererInterface
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


    public function render(Node $node, ChildNodeRendererInterface $childRenderer) : Stringable
    {
        ColorNode::assertInstanceOf($node);

        $attributes = [];

        $color = $this->color_config->colors->{$node->name};
        if (!empty($color)) {
            $attributes["style"] = "color:" . $color;
        }

        return new HtmlElement("span", $attributes, $childRenderer->renderNodes($node->children()));
    }
}
