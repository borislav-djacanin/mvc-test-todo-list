<?php
    /**
     * @author   Sebastian Przybylski <sp@spmedia.de>, Chris Bernasch <main@cbernasch.de>
     * @license  Sebastian Przybylski
     * @link     http://www.spmedia.de http://www.cbernasch.de
     */
    
    namespace compect\mvctest\classes\core;
    
    /**
     * Class Router
     *
     * @package compect\mvctest\classes\core
     */
    class Router
    {
        
        /** @var string */
        private static $default_controller = "start";
        /** @var string */
        private static $default_action = "index";
        /** @var array */
        private static $uriParam;
        
        /**
         * getInstance Method
         */
        public static function getInstance()
        {
            $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : null;
            $url = urldecode($url);
            self::$uriParam = explode('/', $url);
        }
        
        /**
         * @return mixed|string
         */
        public static function getController()
        {
            if (isset(self::$uriParam[0]) && self::$uriParam[0] != '') {
                return self::$uriParam[0];
            } else {
                return self::$default_controller;
            }
        }
        
        /**
         * @return mixed|string
         */
        public static function getAction()
        {
            if (isset(self::$uriParam[1]) && self::$uriParam[1] != '') {
                return self::$uriParam[1];
            } else {
                return self::$default_action;
            }
        }
    }