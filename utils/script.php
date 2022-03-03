<?php
$i = 0;
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Smart-IUT</title>

    <style>
        body{
            margin: auto;
            width: 900px;
        }
        .form{
            padding: 15px;
            border-radius: 10px;
            margin: 20px auto 20px auto;
            background-color: aliceblue;
            max-width: 450px ;
            display: flex;
            justify-content: center;
        }
        form{
            display: flex;
            flex-direction: column;
        }
        input[type="radio"].demo2 {
            display: none;
        }
        input[type="radio"].demo2 + label {
            padding: 0.5rem 1rem;
            font-size: 1.25rem;
            line-height: 1.5;
            border-radius: 0.3rem;
            color: #fff;
            background-color: #6c757d;
            border: 1px solid transparent;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }
        input[type="radio"].demo2.demoyes:hover + label {
            background-color: #218838;
            border-color: #1e7e34;
        }
        input[type="radio"].demo2.demoyes:checked + label {
            background-color: #28a745;
            border-color: #28a745;
        }
        input[type="radio"].demo2.demono:hover + label {
            background-color: #28a745;
            border-color: #28a745;
        }
        input[type="radio"].demo2.demono:checked + label {
            background-color: #28a745;
            border-color: #28a745;
        }
        .radio{
            margin-top: 14px;
            margin-bottom: 14px;
            cursor: pointer;
        }
        .name{
            font-family: Arial;
            font-size: 15px;
            padding: 5px;
            width: 300px;

        }
        .submit{
            background-color: #930019;
            color: white;
            font-family: "Gill Sans";
            padding: 7px;
            border: 1px solid transparent;
        }

    </style>
</head>
<body>

<div class="form" >
<form action="script.php" method="POST" >
    <input type="text" class="name" name="name" placeholder="name" />

    <div class="radio" >
        <input type="radio" name="type" class="demo2 demoyes" id="demo2-a"  value="component" >
        <label for="demo2-a">Component</label>

        <input type="radio" name="type" class="demo2 demono" id="demo2-b" value="module" checked>
        <label for="demo2-b">Module</label>
    </div>
    <input class="submit" type="submit" value="GENERATE" />

</form>
</div>

</body>
</html>
<?php



if(isset($_POST['name']) && isset($_POST['type'])){

    if($_POST['name'] == ''){

        echo "Le nom n'est pas rempli";

    }else{
        $name = $_POST['name'];
        $type = $_POST['type'];
        $nameUpper = ucfirst($name);

        if($type == "component"){
            $path = "../component/" . $name;
            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }



            file_put_contents($path . "/controller_" . $name . ".php", " 
<?php

@require_once('view_$name.php');
@require_once ('model_$name.php');
            
class Controller$nameUpper{
            
    private \$view;
    private \$model;
                
    public function __construct(){
        \$this->view = new View$nameUpper();
        \$this->model = new Model$nameUpper();
    }
}
        ");

            file_put_contents($path . "/model_" . $name . ".php", " 
<?php

@require_once('connexion.php');
            
class Model$nameUpper{

    public function __construct(){

    }

}
        ");

            file_put_contents($path . "/view_" . $name . ".php", " 
<?php

@require_once ('generic_view.php');

class View$nameUpper extends GenericView{

    public function __construct(){

    }

}
        ");

        }else {
            $path = "../modules/" . $name . "_module";
            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }

            $file = fopen("../index.php", "c+b");

            $add = fread($file, 162);

            $add .= ' "' . $name . '" , ';

            $add .= fread($file, filesize("../index.php"));

            fseek($file, 0);
            fwrite($file, $add);


            file_put_contents($path . "/controller_" . $name . ".php", " 
<?php

@require_once('view_$name.php');
@require_once ('model_$name.php');
            
class Controller$nameUpper{
            
    private \$view;
    private \$model;
                
    public function __construct(){
        \$this->view = new View$nameUpper();
        \$this->model = new Model$nameUpper();
    }
}
        ");

            file_put_contents($path . "/model_" . $name . ".php", " 
<?php

@require_once('connexion.php');
            
class Model$nameUpper{

    public function __construct(){

    }

}
        ");

            file_put_contents($path . "/view_" . $name . ".php", " 
<?php

@require_once ('generic_view.php');

class View$nameUpper extends GenericView{

    public function __construct(){

    }

}
        ");


            file_put_contents($path . "/module_" . $name . ".php", " 
<?php

@require_once ('generic_view.php');

class Module{

    private \$action;
    private \$controller;

    public function __construct(){
        \$this->controller = new Controller$nameUpper();
        
        /*
        
        A completer pour les redirections au niveau du controller et $ decommenter surtout !!
        
        if (isset(\$_GET['action'])) {
            \$this->action = \$_GET['action'];
        } else {
            \$this->action = 'a completer';
        }

        switch (\$this->action) {
            case 'a completer' :
                \$this->controller->welcome();
                break;
        }
        
        */
    }

}
        ");

        }

    }

}



