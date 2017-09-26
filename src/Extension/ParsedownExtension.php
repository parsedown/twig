<?php

namespace Parsedown\Extension;

use Parsedown\TokenParser\ParsedownTokenParser;

/**
 * Class ParsedownExtension
 * @package Parsedown\Extension
 */
class ParsedownExtension extends \Twig_Extension {
    /**
     * {@inheritdoc}
     */
    public function getTokenParsers()
    {
        return array(
            new ParsedownTokenParser(),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'parsedown';
    }
}
