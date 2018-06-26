<?php
    /**
     * @author   Sebastian Przybylski <sp@spmedia.de>, Chris Bernasch <main@cbernasch.de>
     * @license  Sebastian Przybylski
     * @link     http://www.spmedia.de http://www.cbernasch.de
     */
    
    namespace compect\mvctest\controller;
    
    require_once '../classes/core/Controller.class.php';
    require_once '../classes/core/View.class.php';
    
    use compect\mvctest\classes\core\Controller;
    use compect\mvctest\classes\core\View;
    
    /**
     * Class Start
     *
     * @package compect\mvctest\controller
     */
    class Start extends Controller
    {
        
        /**
         * Start constructor.
         */
        public function __construct()
        {
            parent::__construct();
        }
        
        /**
         * @return string
         */
        public function indexAction()
        {
            $this->_view = new View('templates/start');
            
            return $this->_view->render();
        }
    }
