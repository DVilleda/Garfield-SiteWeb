<?php
if($controleur->getActeur()=="visiteur"){
	echo "<div id='optionPublication'>";
		echo "<p> Vous devez vous connecter pour signaler une image</p>";
	echo "</div>";
}else{
		echo "<div id='optionPublication'>";
			echo "<button class='optionsdroite' onclick='signaler()'>Signaler</button>";
		echo "</div>";
}
?>