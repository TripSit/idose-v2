<?php
/**
 * Singleton for the Smarty Library
 * 
 * @package atomar
 * @author change <spr1t3-0@riseup.net>
 */
class SmartySingleton
{
    static private $instance;

    private function __construct() {}

    private function __clone() {}

    public function __wakeup() {}

    static public function instance(): Smarty
    {
        if(!isset(self::$instance)) {
            $smarty = new Smarty();

            $smarty->setTemplateDir(APP_ROOT . '/src/views/');
            $smarty->setCompileDir(APP_ROOT . '/../writable/views_c/');
            $smarty->setConfigDir(APP_ROOT . '/config/');

            self::$instance = $smarty;
        }
        return self::$instance;
    }

}