<?php
if($controleur->getActeur()=="visiteur"){
	echo "<div id='optionPublication'>";
		echo "<p> Vous devez vous connecter pour donner un like ou signaler</p>";
	echo "</div>";
}else{
		echo "<div id='optionPublication'>";
			echo "<form action='' method='post'>";
			echo "<input class='optionsgauche' type='Submit' name='1' value='Like' />";
				echo "</form>";
			echo "<button class='optionsdroite' onclick='signaler()'>Signaler</button>";
		echo "</div>";
}
?>