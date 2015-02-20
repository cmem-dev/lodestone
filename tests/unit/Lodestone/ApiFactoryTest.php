<?php
namespace Lodestone;


use Codeception\TestCase\Test;

class ApiFactoryTest extends Test
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

    public function testApiFactory_createの引数が空の時_Characterを取得する()
    {
        $factory = new ApiFactory();
        $this->assertEquals(
            'Lodestone\Api\Character',
            $factory->create('')->className()
        );
    }

    public function testApiFactory_の引数が存在しない名前の時_Characterを取得する()
    {
        $factory = new ApiFactory();
        $this->assertEquals(
            'Lodestone\Api\Character',
            $factory->create('not exists name')->className()
        );
    }

    public function testApiFactory_createの引数がcharacterの時_Characterを取得する()
    {
        $factory = new ApiFactory();
        $this->assertEquals(
            'Lodestone\Api\Character',
            $factory->create('character')->className()
        );
    }

    public function testApiFactory_createの引数がfreecompanyの時_Freecompanyを取得する()
    {
        $factory = new ApiFactory();
        $this->assertEquals(
            'Lodestone\Api\Freecompany',
            $factory->create('freecompany')->className()
        );
    }

    public function testApiFactoryFactory_createの引数がmemberの時_Memberを取得する()
    {
        $factory = new ApiFactory();
        $this->assertEquals(
            'Lodestone\Api\Member',
            $factory->create('member')->className()
        );
    }

}