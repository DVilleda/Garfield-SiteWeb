<?php
	function afficherCommentaires($tabComments) {
		foreach ($tabComments as $option) {
			$tab = explode("||", $option);
			echo "<p class='auteurComment'>".$tab[0]."</p>";
			echo "<p class='texteComment'>".$tab[1]."</p>";
		} 
	}
?>