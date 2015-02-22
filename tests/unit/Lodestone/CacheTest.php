<?php
namespace Lodestone;

use AspectMock\Test as test;

class CacheTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $instance1;
    protected $instance2;

    protected function _before()
    {
        Cache::$_instance = null;
        $this->instance1 = Cache::getInstance();
        $this->instance2 = Cache::getInstance();
    }

    protected function _after()
    {
        Cache::$_instance = null;
    }

    public function testCache_getIncetanceの戻りインスタンスが同一である()
    {
        $this->assertEquals(
            $this->instance1,
            $this->instance2
        );
    }

    public function testCache_forgeの戻りインスタンスが異なる()
    {
        $this->assertNotEquals(
            $this->instance1,
            Cache::forge()
        );
    }

    public function testCache_インスタンス生成()
    {

        $cache = call_user_func(
            \Closure::bind(
                function () {
                    return new Cache();
                }, null, 'Lodestone\Cache'));

        $this->assertTrue(
            $cache instanceof Cache
        );

    }

}
