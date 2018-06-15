<?php

namespace App\Core;

/**
 * Class App
 * @package App\Core
 */
class App
{
    /** @var  Router */
    public static $router;
    /** @var  Kernel */
    public static $kernel;
    /** @var  Request */
    public static $request;

    public static function bootstrap()
    {
        static::$router = new Router();
        static::$kernel = new Kernel();
        static::$request = new Request();
        set_exception_handler([self::class, 'handleException']);
    }

    public static function handleException(\Throwable $e)
    {
        if ($e->getCode() == 404) {
            echo static::$kernel->launchAction('Error', 'error404', $e);
        } else {
            echo static::$kernel->launchAction('Error', 'error500', $e);
        }
    }
}