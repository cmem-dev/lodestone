<?php
namespace Lodestone\Exception;

/**
 * RangeException (extends RuntimeException)
 * @link http://php.net/manual/ja/class.rangeexception.php
 * プログラムの実行時に範囲エラーが発生したことを示すときにスローされる例外です。
 * 通常は、アンダーフローやオーバーフロー以外の計算エラーが発生したことを意味します。
 * これは、実行時版の DomainException です。
 */
class RangeException extends RuntimeException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Range Exception.';
    }
} 