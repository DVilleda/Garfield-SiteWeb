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
	
	<?php
		include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/entete.inc.php');
	?>
	
	
	<?php
		include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/menu.inc.php');
		//menu de categories
		$tabOptions = [DOSSIER_BASE_LIENS."?action=Garfield||Basic Garfield Images||nonChoisi",
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
	
	<?php
	include_once(DOSSIER_BASE_INCLUDE."vues/inclusions/affichage_erreurs.inc.php");
				if (count($controleur->getMessagesErreur()) != 0) {
					afficherListeErreurs($controleur->getMessagesErreur());
				}
				if ($controleur->getActeur() == "administrateur") {
					echo "<p>Vous êtes connecté en tant que ".$_SESSION['adminConnecte']."</p>";
				}else if ($controleur->getActeur() == "usager") {
					echo "<p>Vous êtes connecté en tant que ".$_SESSION['usagerConnecte']."</p>";
				}else{
					echo "<p>Vous n'êtes pas connecté</p>";
				}
			?>
		
	</div>
</body>
</html>
