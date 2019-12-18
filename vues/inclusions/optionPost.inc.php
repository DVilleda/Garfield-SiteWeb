<?php
if($controleur->getActeur()=="visiteur"){
	echo "<div id='optionPublication'>";
		echo "<p> Vous devez vous connecter pour donner un like ou signaler</p>";
	echo "</div>";
}else{
		echo "<div id='optionPublication'>";
			echo "<button class='optionsgauche' onclick='aimer()'>Aimer</button>";
			echo "<button class='optionsdroite' onclick='signaler()'>Signaler</button>";
		echo "</div>";
}
?>