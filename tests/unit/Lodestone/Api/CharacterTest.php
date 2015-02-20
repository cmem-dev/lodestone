<?php
namespace Lodestone\Api;


use Codeception\TestCase\Test;

class CharacterTest extends Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }


    public function testApiCharacter_getMappingの引数が空の時_全mappingを取得する()
    {
        $character = new Character();
        $this->assertTrue(
            count($character->getMapping()) > 1
        );
    }


}