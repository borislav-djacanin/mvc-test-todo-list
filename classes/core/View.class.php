<?php
    /**
     * @author   Sebastian Przybylski <sp@spmedia.de>, Chris Bernasch <main@cbernasch.de>
     * @license  Sebastian Przybylski
     * @link     http://www.spmedia.de http://www.cbernasch.de
     */
    
    namespace compect\mvctest\classes\core;

    /**
     * Class View
     *
     * @package compect\mvctest\classes\core
     */
    class View
    {
        
        /** @var string */
        private $template;
        /** @var array */
        private $helpers = array();
        /** @var array */
        private $vars = array();
        
        /**
         * View constructor.
         *
         * @param $template
         */
        public function __construct($template)
        {
            $this->template = $template;
        }
        
        /**
         * @param $key
         * @param $value
         */
        public function assign($key, $value)
        {
            $this->vars[$key] = $value;
        }
        
        /**
         * @param $key
         * @return bool|mixed
         */
        public function __get($key)
        {
            if (isset($this->vars[$key])) {
                return $this->vars[$key];
            }
            
            return false;
        }
        
        /**
         * @param $methodName
         * @param $params
         * @return string
         */
        public function __call($methodName, $params)
        {
            if (!isset($this->helpers[$methodName])) {
                if (!file_exists('../view/helper/' . $methodName . '.class.php')) {
                    return 'View Helper "' . $methodName . '" not found!';
                }
                include '../view/helper/' . $methodName . '.class.php';
                $methodNameClass = 'compect\mvctest\helper\View_Helper_' . ucfirst($methodName);
                $this->helpers[$methodName] = new $methodNameClass;
                
                return $this->helpers[$methodName]->execute($params);
            }
            
            return $this->helpers[$methodName]->execute($params);
        }
        
        /**
         * @return string
         */
        public function render()
        {
            ob_start();
            $template = '../view/' . $this->template . '.phtml';
            if (!is_file($template)) {
                return 'Template not found!';
            }
            include $template;
            $view = ob_get_clean();
            
            return $view;
        }
    }