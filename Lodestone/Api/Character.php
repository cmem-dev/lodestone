<?php
namespace Lodestone\Api;

class Character extends ApiAbstract
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $config['_id'] = 'Character';
        $config['_group'] = 'Api';
        $config['_url'] = 'http://jp.finalfantasyxiv.com/lodestone/character/';
        parent::__construct($config);
    }

}
