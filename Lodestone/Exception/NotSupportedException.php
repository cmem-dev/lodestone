<?php
namespace Lodestone\Exception;

class NotSupportedException extends BadMethodCallException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Not Supported Exception.';
    }

}