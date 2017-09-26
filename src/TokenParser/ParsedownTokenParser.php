<?php

namespace Parsedown\TokenParser;

use Parsedown\Node\ParsedownNode;

/**
 * Class ParsedownTokenParser
 * @package Parsedown\TokenParser
 */
class ParsedownTokenParser extends \Twig_TokenParser
{
    /**
     * @inheritdoc
     */
    public function parse(\Twig_Token $token)
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();

        if (!$stream->test(\Twig_Token::BLOCK_END_TYPE)) {
            $text = $this->parser->getExpressionParser()->parseExpression()->getAttribute('value');
        } else {
            $stream->expect(\Twig_Token::BLOCK_END_TYPE);

            $text = $this->parser->subparse(function (\Twig_Token $token) {
                return $token->test('endparsedown');
            }, true)->getAttribute('data');
        }

        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        return new ParsedownNode($text, $lineno, $this->getTag());
    }

    /**
     * @inheritdoc
     */
    public function getTag()
    {
        return 'parsedown';
    }
}
