<?php
namespace Lodestone\Exception;

/**
 * UnexpectedValueException (extends RuntimeException)
 * @link http://php.net/manual/ja/class.unexpectedvalueexception.php
 * いくつかの値のセットに一致しない値であった際にスローされる例外です。
 * これが発生する例としては、ある関数が別の関数をコールしていて、
 * その関数の返り値が特定の型や値である (そして計算やバッファ関連のエラーがない)
 * ことを想定している場合があります。
 */
class UnexpectedValueException extends RuntimeException{

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Unexpected Value Exception.';
    }

} 