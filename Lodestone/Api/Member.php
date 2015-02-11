<?php
namespace Lodestone\Api;

class Member extends ApiAbstract
{
    /**
     * Constructor.
     * @param array $config name-value pairs that will be used to initialize the object properties
     */
    public function __construct($config = array())
    {
        parent::__construct([
            "_id" => "Member",
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
