<?php
namespace Lodestone;
use Lodestone\Api\Freecompany;
use Lodestone\Api\Member;
use Lodestone\Api\Character;

/**
 * ApiFactory control.
 */
class ApiFactory extends Object
{
    const API_CHARACTER     = 'character';
    const API_FREECOMPANY   = 'freecompany';
    const API_MEMBER        = 'member';

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

            case self::API_CHARACTER :
            default :
                $objApi = new Character;
                break;
        };

        return $objApi;
    }

}
