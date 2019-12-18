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
<link rel='stylesheet' type='text/css' href='<?php echo DOSSIER_BASE_LIENS;?>/css/GarfieldCSS.css' />
</head>
<body class="garfield">
	<h1>PageConnexion</h1>
	
			<?php
				include_once(DOSSIER_BASE_INCLUDE."vues/inclusions/affichage_erreurs.inc.php");
				if (count($controleur->getMessagesErreur()) != 0) {
					afficherListeErreurs($controleur->getMessagesErreur());
				}
				include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/formulaireConnexionAdmin.inc.php');
			?>
	
</body>
</html>
