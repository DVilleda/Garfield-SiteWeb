<!DOCTYPE html>
<html lang="fr">
<head>
<title>Projet Final:Garfield</title>
<meta charset="utf-8" />
</head>
<body >

	<!-- Le menu sera en verticale, mais l'option de connexion sera en verticale -->
	<?php
		$bool =false;
		if($bool == false){
			$tabOptions = [DOSSIER_BASE_LIENS."?action=seDeconnecter||Se déconnecter||menuItem"];
		}else {
			$tabOptions = [DOSSIER_BASE_LIENS."?action=seConnecter||Se connecter||menuItem"];
		}
		afficherMenu($tabOptions);
	?>
	
	
	
	<?php
			include_once(DOSSIER_BASE_INCLUDE.'vues/include/menuBanniere.php');
			// menu pour admin
			$tabOptions = [DOSSIER_BASE_LIENS."||Maison||menuItem itemActif",
						   DOSSIER_BASE_LIENS."?action=voirEnseignant||Liste des enseignants||menuItem",
						   DOSSIER_BASE_LIENS."?action=voirEvaluation||Liste des évaluations||menuItem",
						   "https://www.w3schools.com||w3schools||menuItem",
						   "https://www.crosemont.qc.ca||Rosemont||menuItem"];
						   
			afficherMenu($tabOptions);
		?>
	<!-- Section centrale du site web -->
		<h1> Garfield et ses amis </h1>
		<!-- Insertion du menu  -->
			<p> Garfield
				Nermal
				Odie
				John
				I'm Sorry John
			</p>
			
		
</body>
</html>
