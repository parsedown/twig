<?php

namespace Parsedown\Node;

/**
 * Class ParsedownNode
 * @package Parsedown\Node
 */
class ParsedownNode extends \Twig_Node {
    /**
     * @param string $text
     * @param int $lineno
     * @param string $tag
     */
    public function __construct($text, $lineno, $tag)
    {
        parent::__construct([], compact('text'), $lineno, $tag);
    }

    /**
     * @param \Twig_Compiler $compiler
     */
    public function compile(\Twig_Compiler $compiler)
    {
        $text = $this->normalize($this->getAttribute('text'));

        $compiler->addDebugInfo($this);
        $compiler->write('echo parsedown("' . $text . '");');
        $compiler->raw("\n");
    }

    /**
     * @param string $text
     * @return string
     */
    protected function normalize($text)
    {
        if ($padding = $this->padding($text)) {
            $lines = [];
            $pattern = '/^\s{' . strlen($padding) . '}/s';

            foreach (explode(PHP_EOL, $text) as $line) {
                $lines[] = preg_replace($pattern, '', $line);
            }

            $text = join(PHP_EOL, $lines);
        }

        return $text;
    }

    /**
     * @param string $text
     * @return string
     */
    protected function padding($text)
    {
        $paddings = [];

        foreach (explode(PHP_EOL, $text) as $line) {
            if (trim($line) && preg_match('/^\s+/', $line, $matches)) {
                if ($padding = end($matches)) {
                    $paddings[] = $padding;
                }
            }
        }

        return count($paddings) ? min($paddings) : '';
    }
}
