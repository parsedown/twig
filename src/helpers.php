<?php

if (!function_exists('parsedown')) {
    /**
     * @param string $text
     * @param bool $wrap
     * @return string
     */
    function parsedown($text, $wrap = true)
    {
        $parser = new \Parsedown();

        if ($wrap) {
            $text = $parser->text($text);
        } else {
            $text = $parser->line($text);
        }

        return $text;
    }
}
