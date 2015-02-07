<?php
namespace Lodestone\Config;

class Character extends ConfigAbstract
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct([
                '_dir'   => 'Data',
                '_id'    => 'character',
                '_group' => 'mapping',
                '_ext'   => 'json'
            ]
        );
    }
}
