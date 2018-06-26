<?php
    /**
     * @author   Sebastian Przybylski <sp@spmedia.de>, Chris Bernasch <main@cbernasch.de>
     * @license  Sebastian Przybylski
     * @link     http://www.spmedia.de http://www.cbernasch.de
     */
    
    namespace compect\mvctest\helper;
    
    /**
     * Class View_Helper_Template
     *
     * @package compect\mvctest\helper
     */
    class View_Helper_Template
    {
        
        /**
         * @param $params
         * @return string
         */
        public function execute($params)
        {
            ob_start();
            $template = '../view/' . $params[0] . ".phtml";
            if (!file_exists($template)) {
                return "Partial template not found!";
            }
            include $template;
            $view = ob_get_clean();
            
            return $view;
        }
    }