<?php 
	if($controleur->getActeur() == "visiteur"){
		echo "<p class='texteComment'>Connectez vous pour commenter!!!!!!!</p>";
	}else {
		echo "<div id='commentaire'>";
		echo "<form action='' method='post'>";
		echo "<input id='comment'    name='comment'    type='text'     size='30' />";
		echo "<input type='Submit' value='Commenter' />";
		echo "</form>";
	}
?>