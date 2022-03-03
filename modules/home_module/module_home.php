 
<?php

@require_once ('controller_home.php');

class Module{

    private $action;
    private $controller;

    public function __construct(){
        $this->controller = new ControllerHome();
        
        if (isset($_GET['action'])) {
            $this->action = $_GET['action'];
        } else {
            $this->action = 'welcome';
        }

        switch ($this->action) {
            case 'welcome' :
                $this->controller->welcome();
                break;
        }
        
    }

}
        