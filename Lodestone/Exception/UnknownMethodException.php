<?php
namespace Lodestone\Exception;

/**
 * UnknownMethodException (extends BadMethodCallException)
 * Lodestone\Objectのみで発生するメソッド不正呼び出し例外です。
 */
class UnknownMethodException extends BadMethodCallException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Unknown Method Exception.';
    }
}
