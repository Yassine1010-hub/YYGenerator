 
<?php

@require_once ('Controller_motivation.php');

class Module{

    private $action;
    private $controller;

    public function __construct(){
        $this->controller = new ControllerMotivation();
        if (isset($_GET['action'])) {
            $this->action = $_GET['action'];
        } else {
            $this->action = 'generator';
        }

        switch ($this->action) {
            case 'generator' :
                $this->controller->generator();
                break;
        }
        
    }

}
        