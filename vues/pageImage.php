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

	
	<div id="zonePublication">
		<?php
			include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/publication.inc.php');
			$tabImage = [];	
			$tabDAO = $controleur->getImages();
			array_push($tabImage,$tabDAO[0]->__toString());
			afficherImage($tabImage);
		?>
		
		
		<div id='optionPublication'>
			<button class='optionsgauche' onclick='aimer()'>Aimer</button>
			<button class='optionsdroite2' onclick='signaler()'>Signaler</button>
		</div>
		
		<div id="commentaire">
			<?php 
			include_once(DOSSIER_BASE_INCLUDE.'vues/inclusions/functionComments.inc.php');
				$tabComments = ["paulo_paul_paul||Bonjour, j'aime beaucoup trop votre publication",
				"jean||GarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfield<br>GarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfieldGarfield",
				"walter||walter"];
				afficherCommentaires($tabComments);
			?>
		</div>
		
	</div>
</body>
</html>
