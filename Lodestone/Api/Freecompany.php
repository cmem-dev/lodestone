<?php
namespace Lodestone\Api;

class Freecompany extends ApiAbstract
{
    /**
     * Constructor.
     * @param array $config name-value pairs that will be used to initialize the object properties
     */
    public function __construct($config = array())
    {
        parent::__construct([
            "_id" => "Freecompany",
            "_group" => "Api"
        ]);
    }
}
