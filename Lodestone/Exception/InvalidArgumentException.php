<?php
namespace Lodestone\Exception;

/**
 * InvalidArgumentException (extends LogicException)
 * @link http://php.net/manual/ja/class.invalidargumentexception.php
 * 引数の型が期待する型と一致しなかった場合にスローされる例外です。
 */
class InvalidArgumentException extends LogicException
{

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Invalid Argument Exception.';
    }

}