<?php
namespace Lodestone;


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log {

    /** @var \Monolog\Logger */
    private static $_instance = null;

    /**
     */
    private function __construct() {
    }

    /**
     * Get Monolog instance;
     */
    public static function getInstance()
    {
        is_null(Log::$_instance) and Log::forge();
        return Log::$_instance;
    }

    /**
     * Create Log object and set it to static variable.
     *
     * @return void
     */
    public static function forge()
    {
        $vendorDir = dirname(__FILE__);
        Log::$_instance = new Logger(
            'lodestone',
            [new StreamHandler(
                $vendorDir.'/Log/lodestone.log',
                Logger::DEBUG
            )]
        );
    }

    /**
     * Adds a log record at the DEBUG level.
     *
     * @param string $str
     * @param array $context
     * @return void
     */
    public static function debug($str='', $context=[])
    {
        Log::getInstance()->debug($str,$context);
    }

    /**
     * Adds a log record at the INFO level.
     *
     * @param string $str
     * @param array $context
     * @return void
     */
    public static function info($str='', $context=[])
    {
        Log::getInstance()->info($str,$context);
    }

    /**
     * Adds a log record at the NOTICE level.
     *
     * @param string $str
     * @param array $context
     * @return void
     */
    public static function notice($str='', $context=[])
    {
        Log::getInstance()->notice($str,$context);
    }

    /**
     * Adds a log record at the WARNING level.
     *
     * @param string $str
     * @param array $context
     * @return void
     */
    public static function warning($str='', $context=[])
    {
        Log::getInstance()->warning($str,$context);
    }

    /**
     * Adds a log record at the ERROR level.
     *
     * @param string $str
     * @param array $context
     * @return void
     */
    public static function error($str='', $context=[])
    {
        Log::getInstance()->error($str,$context);
    }

    /**
     * Adds a log record at the CRITICAL level.
     *
     * @param string $str
     * @param array $context
     * @return void
     */
    public static function critical($str='', $context=[])
    {
        Log::getInstance()->critical($str,$context);
    }

    /**
     * Adds a log record at the ALERT level.
     *
     * @param string $str
     * @param array $context
     * @return void
     */
    public static function alert($str='', $context=[])
    {
        Log::getInstance()->alert($str,$context);
    }

    /**
     * Adds a log record at the EMERGENCY level.
     *
     * @param string $str
     * @param array $context
     * @return void
     */
    public static function emergency($str='', $context=[])
    {
        Log::getInstance()->emergency($str,$context);
    }
}