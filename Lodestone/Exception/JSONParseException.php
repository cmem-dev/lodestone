<?php
namespace Lodestone\Exception;

/**
 * JSONParseException (extends RuntimeException)
 */
class JSONParseException extends RuntimeException
{
    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'JSON Parse Exception.';
    }

} 