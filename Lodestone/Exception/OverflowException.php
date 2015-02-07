<?php
namespace Lodestone\Exception;

/**
 * OverflowException (extends RuntimeException)
 * @link http://php.net/manual/ja/class.overflowexception.php
 * いっぱいになっているコンテナに要素を追加した場合にスローされる例外です。
 */
class OverflowException extends RuntimeException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Overflow Exception.';
    }

} 