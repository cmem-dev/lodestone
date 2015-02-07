<?php
namespace Lodestone;

/**
 * Cache control.
 */
class Cache
{
    /**
     * Instance of Cache class.
     * @var object
     */
    public static $_instance = NULL;

    /**
     * Default cache lifetime.
     */
    const LIFETIME = '3000';

    /**
     * Directory to save cache files.
     */

    const CACHEDIR = '/Storage/';
    /**
     * コンストラクタ
     */
    private function __construct() {
    }

    /**
     * Create Cache object and set it to static variable.
     *
     * @return void
     */
    public static function forge()
    {
        $vendorDir = dirname(__FILE__);
        $options = array(
            'cacheDir' => $vendorDir . Cache::CACHEDIR,
            'lifeTime' => Cache::LIFETIME
        );
        Cache::$_instance = new \Cache_Lite($options);
    }

    /**
     * Get Cache_Lite object.
     *
     * @return \Cache_Lite
     */
    public static function getInstance()
    {
        is_null(Cache::$_instance) and Cache::forge();

        return Cache::$_instance;
    }

    /**
     * Get data from cache.
     *
     * @param  string $id       cache id
     * @param  string $group    name of the cache group
     * @param  int    $lifeTime custom lifetime
     * @return mixed  data of cache (else : false)
     */
    public static function get($id, $group = 'default', $lifeTime = NULL)
    {
        $core = Cache::getInstance();

        // set custom lifetime.
        !is_null($lifeTime) and $core->setOption('lifeTime', $lifeTime);

        $cache = $core->get($id, $group);

        // set back to default lifetime.
        !is_null($lifeTime) and $core->setOption('lifeTime', Cache::LIFETIME);

        return $cache;
    }

    /**
     * Save data into cache.
     *
     * @param  mixed  $data  data of cache
     * @param  string $id    cache id
     * @param  string $group name of the cache group
     * @return void
     */
    public static function save($data, $id, $group = 'default')
    {
        $core = Cache::getInstance();
        $core->save($data, $id, $group);
    }

    /**
     * Clean cache.
     *
     * @param bool|string $group name of the cache group
     * @return void
     */
    public static function clean($group = FALSE)
    {
        $core = Cache::getInstance();
        $core->clean($group);
    }

}
