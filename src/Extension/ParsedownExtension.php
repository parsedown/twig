<?php

namespace Parsedown\Extension;

use Parsedown\TokenParser\ParsedownTokenParser;

/**
 * Class ParsedownExtension
 * @package Parsedown\Extension
 */
class ParsedownExtension extends \Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('parsedown', 'parsedown', [
                'is_safe' => ['all']
            ]),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('parsedown', 'parsedown', [
                'is_safe' => ['all']
            ]),
        ];
    }


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
