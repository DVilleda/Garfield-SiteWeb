<?php
	echo "<div id='barreOption'>";
	if($controleur->getActeur()== "visiteur"){
	echo "<a href='<?php echo DOSSIER_BASE_LIENS;?>/vues/pageAccueil.php' class='optionsgauche'>";
			echo "<img alt='logo' src='img/GarfieldCharacter.jpg' height='30' /> ";
		echo "</a>";
		echo "<a class='optionsdroite' href='?action=creerCompte'> <p>Créer un compte</p></a>";
		echo "<a  class='optionsdroite2' href='?action=connexion'><p>se connecter</p></a>";
	echo "</div>";
	}else {
		echo "<a class='optionsgauche' href='?action=publier'><p> publier </p>";
		echo "<a href='<?php echo DOSSIER_BASE_LIENS;?>/vues/pageAccueil.php' class='optionsgauche'>";
			echo "<img alt='logo' src='img/GarfieldCharacter.jpg' height='30' /> ";
		echo "</a>";
		echo "<a  class='optionsdroite' href='?action=deconnexion'><p>deconnecter</p></a>";
	echo "</div>";
	}
?>