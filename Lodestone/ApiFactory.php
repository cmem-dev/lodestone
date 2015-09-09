<?php
namespace Lodestone;
use Lodestone\Api\Freecompany;
use Lodestone\Api\Member;
use Lodestone\Api\Character;
use Lodestone\Api\News;
use Lodestone\Api\Topics;
use Lodestone\Api\Worldstatus;

/**
 * ApiFactory control.
 */
class ApiFactory extends Object
{
    const API_CHARACTER     = 'character';
    const API_FREECOMPANY   = 'freecompany';
    const API_MEMBER        = 'member';
    const API_WORLDSTATUS   = 'worldstatus';
    const API_TOPICS        = 'topics';
    const API_NEWS          = 'news';

    /**
     * @param $name
     * @return $this|void
     */
    public static function create($name)
    {
        switch($name){

            case self::API_FREECOMPANY :
                $objApi = new Freecompany;
                break;

            case self::API_MEMBER :
                $objApi = new Member;
                break;

            case self::API_WORLDSTATUS :
                $objApi = new Worldstatus;
                break;

            case self::API_TOPICS :
                $objApi = new Topics;
                break;

            case self::API_NEWS :
                $objApi = new News;
                break;

            case self::API_CHARACTER :
            default :
                $objApi = new Character;
                break;
        };

        return $objApi;
    }

}
