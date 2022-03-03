<?php

class ArrayList{

    private $list;

    public function __construct()
    {
        $this->list = array();
    }

    public function addList($list){
        $this->list = $list;
    }

    public function add($object){
        array_push($this->list, $object);
    }

    public function remove($indice){
        array_splice($this->list, $indice, 1);
    }

    public function get($indice){
        return $this->list[$indice];
    }

    public function size(){
        return count($this->list);
    }
    
    public function getArrayList(): array{
        return $this->list;
    }
}