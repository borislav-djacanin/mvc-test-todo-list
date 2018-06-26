<?php
    /**
     * @author   Sebastian Przybylski <sp@spmedia.de>, Chris Bernasch <main@cbernasch.de>
     * @license  Sebastian Przybylski
     * @link     http://www.spmedia.de http://www.cbernasch.de
     */
    
    namespace compect\mvctest\classes\core;
    
    /**
     * Class Controller
     *
     * @package compect\mvctest\classes\core
     */
    class Controller
    {
        
        protected $_view;
        protected $_model;
        
        /**
         * Controller constructor.
         */
        function __construct()
        {
            $name = get_class($this);
            $modelpath = 'model/' . $name . '.class.php';
            if (file_exists($modelpath)) {
                require $modelpath;
                $modelName = 'Model_' . $name;
                $this->_model = new $modelName();
            }
        }
        
        /**
         * @return array
         */
        public function getArguments()
        {
            $args = [];
            foreach ($_POST as $key => $value) {
                $args[$key] = $value;
            }
            foreach ($_GET as $key => $value) {
                $args[$key] = $value;
            }
            
            return $args;
        }
    }