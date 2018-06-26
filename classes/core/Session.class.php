<?php
    /**
     * @author   Sebastian Przybylski <sp@spmedia.de>, Chris Bernasch <main@cbernasch.de>
     * @license  Sebastian Przybylski
     * @link     http://www.spmedia.de http://www.cbernasch.de
     */
    
    namespace compect\mvctest\classes\core;

    /**
     * Class Session
     *
     * @package compect\mvctest\classes\core
     */
    class Session
    {
        
        /**
         * Session constructor.
         */
        public function __construct()
        {
        }
        
        /**
         * clone stub
         */
        public function __clone()
        {
        }
        
        /**
         * @param $key
         * @return string
         */
        public static function get($key)
        {
            if (isset($_SESSION[SESSIONPREFIX][strtolower($key)])) {
                return $_SESSION[SESSIONPREFIX][strtolower($key)];
            } else {
                return '';
            }
        }
        
        /**
         * @param $key
         * @param $value
         */
        public static function set($key, $value)
        {
            $_SESSION[SESSIONPREFIX][strtolower($key)] = $value;
        }
        
        /**
         * @param $key
         */
        public static function unsetkey($key)
        {
            unset($_SESSION[SESSIONPREFIX][strtolower($key)]);
        }
        
        public static function post($post)
        {
            foreach ($post as $key => $value) {
                self::set($key, $value);
            }
        }
        
        /**
         * @return bool
         */
        public static function destroy()
        {
            unset($_SESSION);
            
            return session_destroy();
        }
        
    }