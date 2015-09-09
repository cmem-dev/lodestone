<?php
namespace Lodestone;

class Utils {
    /**
     * 変数が空白かどうかをチェックする.
     *
     * 引数 $val が空白かどうかをチェックする. 空白の場合は true.
     * 以下の文字は空白と判断する.
     * - ' ' (ASCII 32 (0x20)), 通常の空白
     * - "\t" (ASCII 9 (0x09)), タブ
     * - "\n" (ASCII 10 (0x0A)), リターン
     * - "\r" (ASCII 13 (0x0D)), 改行
     * - "\0" (ASCII 0 (0x00)), NULバイト
     * - "\x0B" (ASCII 11 (0x0B)), 垂直タブ
     *
     * 引数 $val が配列の場合は, 空の配列の場合 true を返す.
     *
     * 引数 $greedy が true の場合は, 全角スペース, ネストした空の配列も
     * 空白と判断する.
     *
     * @param  mixed   $val    チェック対象の変数
     * @param  boolean $greedy '貧欲'にチェックを行う場合 true
     * @return boolean $val が空白と判断された場合 true
     */
    public static function isBlank($val, $greedy = true)
    {
        if (is_array($val)) {
            if ($greedy) {
                if (empty($val)) {
                    return true;
                }
                $array_result = true;
                foreach ($val as $in) {
                    $array_result = Utils::isBlank($in, $greedy);
                    if (!$array_result) {
                        return false;
                    }
                }

                return $array_result;
            } else {
                return empty($val);
            }
        }

        if ($greedy) {
            $val = preg_replace('/　/', '', $val);
        }

        $val = trim($val);
        if (strlen($val) > 0) {
            return false;
        }

        return true;
    }
    /**
     * Tries to guess the name of the param, based on its class
     * Example: \Lodestone\Config\CharacterName => character_name
     *
     * @param string|object Class or Class name
     * @return string parameter name
     */
    public static function getParamName($class)
    {
        if (is_object($class)) {
            $class = get_class($class);
        }

        $parts = explode('\\', $class);
        $last  = array_pop($parts);
        $name  = Utils::toSnakeCase($last);

        return $name;
    }

    /**
     * Converts a CamelCase string to snake_case
     *
     * For Example HelloWorld to hello_world
     *
     * @param  string $string CamelCase String to Convert
     * @return string SnakeCase string
     */
    public static function toSnakeCase($string)
    {
        $string = preg_replace('/([A-Z])/', '_$1', $string);
        return strtolower(substr($string, 1));
    }

    /**
     * Trim query string append
     *
     * For Example abc?123456789 => abc
     *
     * @param  string $string
     * @return string trim string
     */
    public static function trimQsa($string)
    {
        return preg_replace('/\?[A-Za-z0-9]+$/', '', $string);
    }

    /**
     * swap array.
     *
     * @param array $array
     * @param bool $isColumnName
     * @return array
     */
    public static function swapArray($array, $isColumnName = true)
    {
        $arrRet = array();
        foreach ($array as $key1 => $arr1) {
            if (!is_array($arr1)) continue 1;
            $index = 0;
            foreach ($arr1 as $key2 => $val) {
                if ($isColumnName) {
                    $arrRet[$key2][$key1] = $val;
                } else {
                    $arrRet[$index++][$key1] = $val;
                }
            }
        }
        return $arrRet;
    }
}