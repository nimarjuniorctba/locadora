<?php 
    class Autoload{
        public function __construct(){
            spl_autoload_extensions('.class.php');
            spl_autoload_register(array($this, 'load'));
        }

        private function load($class){
            $extension = spl_autoload_extensions();
            
            $dirs = array(
                                'classes/'
                            ,   'classes/modelo/'
                            ,   'classes/acesso/'
                            ,   '../classes/'
                            ,   '../classes/modelo/'
                            ,   '../classes/acesso/'
                        );
            
            foreach( $dirs as $dir ) {
                if (file_exists($dir.strtolower($class).'.class.php')) {
                   require_once($dir.strtolower($class).'.class.php');
                }
            }

        }
    }

   $autoload       =   new AutoLoad();
