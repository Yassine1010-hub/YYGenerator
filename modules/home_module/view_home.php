 
<?php

@require_once ('template/genericView.php');


class ViewHome extends GenericView{

    public function __construct(){

    }

    public function welcome(){
        ?>
        <div class="welcome">
        	<h1 class="title" > Bienvenue sur YYGenerator</h1>

	        <div class="nav">
	        	<p> Choisissez ce que vous voulez faire </p>

	        	<div class="button">
	        		<div class="section">
	        			<h5> Lettre de motivation</h5>
	        			<a class="btn" href="index.php?module=motivation"> Générer </a>
	        		</div>
	        		<div class="section">
	        			<h5> CV </h5>
	        			<a class="btn" href="index.php?module=motivation"> Générer </a>
	        		</div>
	        	</div>
	        </div>
        </div>

        <?php
    }

}
        