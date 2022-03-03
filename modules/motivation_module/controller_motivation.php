 
<?php

@require_once('view_motivation.php');
            
class ControllerMotivation{
            
    private $view;
    private $model;
                
    public function __construct(){
        $this->view = new ViewMotivation();
    }

    public function generator(){
    	$this->view->generator();
    }
}
        