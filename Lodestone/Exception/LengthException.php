<?php
namespace Lodestone\Exception;

/**
 * LengthException (extends LogicException)
 * @link http://php.net/manual/ja/class.lengthexception.php
 * 長さが無効な場合にスローされる例外です。
 */
class LengthException extends LogicException
{

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Length Exception.';
    }


} 