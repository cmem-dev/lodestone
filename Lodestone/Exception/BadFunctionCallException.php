<?php
namespace Lodestone\Exception;

/**
 * BadFunctionCallException (extends LogicException)
 * @link http://php.net/manual/ja/class.badfunctioncallexception.php
 * 未定義の関数をコールバックが参照したり、
 * 引数を指定しなかったりした場合にスローされる例外です。
 */
class BadFunctionCallException extends LogicException
{

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Bad Function Call Exception.';
    }

}