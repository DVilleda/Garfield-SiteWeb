<?php 
	if (!ISSET($controleur)) {
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>ProjetFinal: Garfield</title>
<meta charset="utf-8" />
<link rel='stylesheet' type='text/css' href='<?php echo DOSSIER_BASE_LIENS;?>/css/garfield.css' />
<script type="text/javascript" src="<?php echo DOSSIER_BASE_LIENS;?>/javascript/garfriend.js"></script>

</head>
<body onload="go()" id="corps" class="garfield">
	
	<h1 id="nomSite" class="vert">Welcome to garfield and friends </h1>
	
	<div id="barreOption">
		<p class="optionsgauche"> publier </p>
		<a class="optionsdroite" href="<?php echo DOSSIER_BASE_LIENS;?>/vues/pageNewUsager.php"> <p>Créer un compte</p></a>
		<a  class="optionsdroite2" href="<?php echo DOSSIER_BASE_LIENS;?>/vues/pageConnexion.php"><p>se connecter</p></a>
	</div>
	
	<?php
		include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/menu.inc.php');
		
		//menu de categories
		$tabOptions = [DOSSIER_BASE_LIENS."?action=Garfield||Basic Garfield Images||garfieldChoisi",
		DOSSIER_BASE_LIENS."?action=SorryJon||I'm sorry Jon||nonChoisi",
		DOSSIER_BASE_LIENS."?action=Garfriend||Garfriend||nonChoisi",
		DOSSIER_BASE_LIENS."?action=Fiction||FanFiction||nonChoisi",
		DOSSIER_BASE_LIENS."?action=Wholesome||Wholesome Garfield||nonChoisi",
		DOSSIER_BASE_LIENS."?action=Nermal||We HATE Nermal||nonChoisi",
		DOSSIER_BASE_LIENS."?action=GarfKart||Garfield Kart discussion||nonChoisi",
		DOSSIER_BASE_LIENS."?action=EZCOOL||Cool Garfield||nonChoisi"];
		
		afficherMenu($tabOptions);
	?>
	
	<?php
		include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/adSpace.inc.php');
	?>

	<div id="zonePublication">
		<p class="titrePost">Ma première publication!!!<p>
		<p class="textePost">Cette image est d'une grandiose beautée</p>
		
			
		<img src="img/garfield.png" alt="The very pretty garfield" class="image">
		<p class="auteurPost"> Publié par: paulo_paul_paul</p> 	
		<div id="optionPublication">
			<button class="optionsgauche" onclick="aimer()">Aimer</button>
			<button class="optionsgauche"> Précédent </button>
			<button class="optionsdroite"> suivant </button>	
			<button class="optionsdroite2" onclick="signaler()">Signaler</button>
		</div>
		
		<?php
		include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/comments.inc.php');
	?>
		
	</div>
</body>
</html>
