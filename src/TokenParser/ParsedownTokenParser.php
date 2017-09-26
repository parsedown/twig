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

        $value = 'Morbi leo risus, porta ac consectetur ac, vestibulum at eros.';

        return new ParsedownNode($value, $lineno, $this->getTag());
    }

    /**
     * @inheritdoc
     */
    public function getTag()
    {
        return 'parsedown';
    }
}
