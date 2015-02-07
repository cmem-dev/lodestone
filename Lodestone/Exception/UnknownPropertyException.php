<?php
namespace Lodestone\Exception;

/**
 * UnknownPropertyException (extends BadMethodCallException)
 * Lodestone\Objectのみで発生するプロパティ不正呼び出し例外です。
 */
class UnknownPropertyException extends LogicException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Unknown Property';
    }
}
