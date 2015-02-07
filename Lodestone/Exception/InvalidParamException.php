<?php
namespace Lodestone\Exception;

/**
 * InvalidCallException (extends BadMethodCallException)
 * Lodestone\Paramのみで発生する不正呼び出し例外です。
 */
class InvalidParamException extends BadMethodCallException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Invalid Parameter';
    }
}