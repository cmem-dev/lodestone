<?php
namespace Lodestone\Exception;

/**
 * OutOfBoundsException (extends RuntimeException)
 * @link http://php.net/manual/ja/class.outofboundsexception.php
 * 値が有効なキーでなかった場合にスローされる例外です。
 * これは、コンパイル時には検出できないエラーです。
 */
class OutOfBoundsException extends RuntimeException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Out of Bounds Exception.';
    }

} 