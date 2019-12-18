<?php
	function afficherImage($tabImage) {
			foreach ($tabImage as $option) {
			$tab = explode("||", $option);
			echo "<a href='?action=imageFull".$tab[1]."'>";
			echo "<p class='titrePost'>".$tab[0]."<p>";
			echo "<p class='textePost'> Num Image: #".$tab[1]."<p>";
			echo "<img src='".$tab[2]."' class=image>";
			echo "<p class='auteurPost'> Pointage:".$tab[3]."</p>";	 
			echo "</a></br>";
		}
	}
?>