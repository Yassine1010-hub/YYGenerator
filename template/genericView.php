<?php
class GenericView{

    public function __construct(){
        ob_start();
    }

    public function getView(){
        return ob_get_clean();
    }
}