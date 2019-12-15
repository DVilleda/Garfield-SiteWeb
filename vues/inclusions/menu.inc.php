<?php
	function afficherMenu($tabOptionMenu) {
		echo "<div id='sousGarfield'>";
		foreach ($tabOptionMenu as $option) {
			$tab = explode("||", $option);
			echo "<a href='".$tab[0]."'><p class='".$tab[2]."'>".$tab[1]."</p></a>";
		} 
		echo "</div>";
	}
?>