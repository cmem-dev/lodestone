<?php
namespace Lodestone\Exception;

/**
 * UnderflowException (extends RuntimeException)
 * @link http://php.net/manual/ja/class.underflowexception.php
 * 空のコンテナ上で無効な操作 (要素の削除など) を試みたときにスローされる例外です。
 */
class UnderflowException extends RuntimeException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Underflow Exception.';
    }

} 