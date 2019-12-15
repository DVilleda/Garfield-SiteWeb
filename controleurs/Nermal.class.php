<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/administrateurDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");

	class Nermal extends  Controleur {

		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// ******************* Méthode exécuter action
		public function executerAction() {
			return "pageNermal";
			
		}
		
		private function validerPOST() {
			$valide = true;
			$listeParametres = ['numero_employe','prenom','nom','mot_passe'];
			if (! ISSET($_POST['numero']) || ! ISSET($_POST['motPasse'])) {
				$valide = false;
			} else  {
					if ($_POST['numero'] == "" || $_POST['motPasse'] == "") {
						$valide = false;
					}
					
			}
			return $valide;
		}
	}	

?>