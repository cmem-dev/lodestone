<?php

namespace Lodestone;
use Lodestone\Exception\JSONParseException;

/**
 * Lodestone JSON tools
 *
 * @package Lodestone
 */
class JSON
{
    /**
     * Parse JSON string to an array
     *
     * @throws JSONParseException
     * @internal param string $json JSON string to parse
     * @return array  PHP array representation of JSON string
     * @link http://php.net/manual/en/function.json-decode.php
     * @link http://www.php.net/manual/en/function.json-last-error.php
     */
    public static function parse(/* inherit from json_decode */)
    {
        $args = func_get_args();
        if (sizeof($args) === 1) {
            $args[] = true;
        }

        // run decode
        $array = call_user_func_array('json_decode', $args);

        // turn errors into exceptions for easier catching
        $error = json_last_error();
        if ($error !== JSON_ERROR_NONE) {
            throw new JSONParseException($error);
        }

        // output
        return $array;
    }

    /**
     * Convert input to JSON string with standard options
     *
     * @param  mixed check args for PHP function json_encode
     * @return string Valid JSON representation of $input
     * @link http://php.net/manual/en/function.json-encode.php
     */
    public static function stringify(/* inherit from json_encode */)
    {
        $args = func_get_args();
        if (sizeof($args) > 1) {
            $args[1] = defined('JSON_UNESCAPED_UNICODE') ? JSON_UNESCAPED_UNICODE : 256;
        }

        // run encode and output
        return call_user_func_array('json_encode', $args);
    }
}
