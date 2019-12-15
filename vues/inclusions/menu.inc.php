<?php

	// Fonction qui crée et affiche  une division (de classe css .menu) pour afficher un menu
	//
	// Cette divsion contient des sous divisions (de classe css .menuItem) entourée d'hyperlien (<a><div>...</div></a>)
	// 
	// Le paramètre $tabOptionMenu, contient un tablea de String qui ont chacune le format :
	//            Hyperlien à placed dans le href de <a>||Texte à afficher dans la <div>||classes css à ajouter au <div>...           
	// Par exemple pour un choix de menu on pourrait avoir :
	//            vues/pageLogin.php||Se connecter||menuItem itemActif
	// Dans ce cas l'HTML correspondant doit être:
	//            <a href="vues/pageLogin.php"><div class="menuItem itemActif">Se connecter</div></a>
	function afficherMenu($tabOptionMenu) {
		echo "<div class='menu'>";
		foreach ($tabOptionMenu as $option) {
			$tab = explode("||", $option);
			echo "<a href='".$tab[0]."'><div class='".$tab[2]."'>".$tab[1]."</div></a>";
		} 
		echo "</div>";
	}
?>