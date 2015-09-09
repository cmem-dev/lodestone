<?php
namespace Lodestone\Api;

class Freecompany extends ApiAbstract
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $config['_id'] = 'Freecompany';
        $config['_group'] = 'Api-Freecompany';
        $config['_url'] = 'http://jp.finalfantasyxiv.com/lodestone/freecompany/';
        parent::__construct($config);
    }
}
