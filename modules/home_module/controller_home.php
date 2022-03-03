 
<?php

@require_once('view_home.php');

class ControllerHome{
            
    private $view;

    public function __construct(){
        $this->view = new ViewHome();
    }

    public function welcome(){
        $this->view->welcome();
    }
}
        