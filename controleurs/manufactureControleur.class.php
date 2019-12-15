<?php

	include_once(DOSSIER_BASE_INCLUDE."controleurs/seDeconnecter.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/defaut.class.php");
	
	include_once(DOSSIER_BASE_INCLUDE."controleurs/BasicGarfield.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/EZCool.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/SorryJon.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/Fiction.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/Wholesome.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/Nermal.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/Garfriend.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/GarfKart.class.php");
	
	class ManufactureControleur {
		//  Méthode qui crée une instance du controleur associé à l'action
		//  et le retourne
		public static function creerControleur($action) {
			$controleur = null;
			if ($action == "Garfield") {
				$controleur = new BasicGarfield();	
			} elseif ($action == "SorryJon") {
				$controleur = new SorryJon();
			} elseif ($action == "Garfriend") {
				$controleur = new Garfriend();
			} elseif ($action == "Fiction") {
				$controleur = new Fiction();
			} elseif ($action == "Wholesome") {
				$controleur = new Wholesome();
			} elseif ($action == "Nermal") {
				$controleur = new Nermal();
			} elseif ($action == "GarfKart") {
				$controleur = new GarfKart();
			} elseif ($action == "EZCOOL") {
				$controleur = new EZCool();
			} else {
				$controleur = new Defaut();
			}
			return $controleur;
		}
	}
	
?>