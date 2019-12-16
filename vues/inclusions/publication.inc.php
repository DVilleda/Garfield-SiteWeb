<?php
	function afficherImage($tabImage) {
		foreach ($tabImage as $option) {
			$tab = explode("||", $option);
			echo "<p class='titrePost'>".$tab[0]."<p>";
			echo "<p class='textePost'>".$tab[1]."<p>";
			echo "<img src='".$tab[2]."' class=image>";
			echo "<p class='auteurPost'> Publié par:".$tab[3]."</p>";
			
		} 
	}
?>