<?php

namespace Lodestone\Exception;

/**
 * DomainException (extends LogicException)
 * @link http://php.net/manual/ja/class.domainexception.php
 * 定義したデータドメインに値が従わないときにスローされる例外です。
 */
class DomainException extends LogicException
{

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Domain Exception.';
    }

}