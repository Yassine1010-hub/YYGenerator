 
<?php

@require_once ('template/genericView.php');

class ViewMotivation extends GenericView{

    public function __construct(){

    }

    public function generator(){
    	?>

    	<div class="formCV">
    		<form>
    			<div class="container identity">
    				<h4>Votre identite</h4>
    				<div class=field>
    					<label>Nom</label>
    					<input type="text" placeholder="Nom" name="name" />
    				</div>

    				<div class=field>
    					<label>Prénom</label>
    					<input type="text" placeholder="Prénom" name="surname"/>
    				</div>

    				<div class=field>
    					<label>Numéro de tel</label>
    					<input type="text" placeholder="tel" name="phone" />
    				</div>

    				<div class=field>
    					<label>Adresse mail</label>
    					<input type="text" placeholder="Mail" name="mail" />
    				</div>

    				<div class=field>
    					<label>Adresse postal complète</label>
    					<input type="text" placeholder="Adresse" name="adress" />
    				</div>

					<div class=field>
    					<label>Quels sont vos objectifs ?</label>
    					<textarea></textarea>
    				</div>

    			</div>

    			<div class="container formation">
    				<h4>Vos formations</h4>
    				<div class="container__btn">
    					<button> <img class="ico" src="https://img.icons8.com/stickers/100/000000/add.png"/> Ajouter une formation</button>
    				</div>
    			</div>

    			<div class="container identity">
    				<h4>Vos Experience</h4>
    				<div class="container__btn">
    					<button> <img class="ico" src="https://img.icons8.com/stickers/100/000000/add.png"/> 
    					Ajouter une formation</button>
    				</div>
    			</div>
  
    		</form>
    	</div>
    	<?php
    }

}
        