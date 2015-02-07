<?php
namespace Lodestone\Exception;

/**
 * OutOfRangeException (extends LogicException)
 * @link http://php.net/manual/ja/class.outofrangeexception.php
 * 無効なインデックスを要求した場合にスローされる例外です。
 * これは、コンパイル時に検出しなければなりません。
 */
class OutOfRangeException extends LogicException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Out Range.';
    }

} 