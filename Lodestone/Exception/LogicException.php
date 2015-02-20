<?php
namespace Lodestone\Exception;
use Lodestone\Exception;

/**
 * LogicException (extends Exception)
 * @link http://php.net/manual/ja/class.logicexception.php
 * プログラムのロジック内でのエラーを表す例外です。
 * この類の例外が出た場合は、自分が書いたコードを修正すべきです。
 */
class LogicException extends Exception
{

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Logic Exception.';
    }

}