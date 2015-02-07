<?php
namespace Lodestone\Exception;

/**
 * BadMethodCallException (extends BadFunctionCallException)
 * @link http://php.net/manual/ja/class.badfunctioncallexception.php
 * 未定義のメソッドをコールバックが参照したり、
 * 引数を指定しなかったりした場合にスローされる例外です。
 */
class BadMethodCallException extends BadFunctionCallException
{

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Bad Method Call Exception.';
    }

}
