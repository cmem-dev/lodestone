<?php
namespace Lodestone\Exception;
use Lodestone\Exception;

/**
 * RuntimeException (extends Exception)
 * @link http://php.net/manual/ja/class.runtimeexception.php
 * プ実行時にだけ発生するようなエラーの際にスローされます。
 */
class RuntimeException extends Exception
{

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Runtime Exception.';
    }
} 