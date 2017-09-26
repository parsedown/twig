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
        $compiler->addDebugInfo($this);
        $compiler->write('echo parsedown("' . $this->getAttribute('text') . '");');
        $compiler->raw("\n");
    }
}
