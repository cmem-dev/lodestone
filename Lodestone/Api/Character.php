<?php
namespace Lodestone\Api;

class Character extends ApiAbstract
{

    /**
     * Constructor.
     * @param array $config name-value pairs that will be used to initialize the object properties
     */
    public function __construct($config = array())
    {
        parent::__construct([
            "_id" => "Character",
            "_group" => "Api"
        ]);
    }

    /**
     * @param string $id
     * @return array
     */
    public function get($id=''){
        return [];
    }

}
