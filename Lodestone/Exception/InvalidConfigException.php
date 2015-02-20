<?php
namespace Lodestone\Exception;

/**
 * InvalidCallException (extends BadMethodCallException)
 * Lodestone\Configのみで発生する設定クラス例外です。
 */
class InvalidConfigException extends LogicException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Invalid Config Exception.';
    }
}