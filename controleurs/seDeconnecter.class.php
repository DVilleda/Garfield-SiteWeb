<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");

	class SeDeconnecter extends  Controleur {

		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- VÉRIFIER LE TYPE D'ACTEUR -----------
			if ($this->getActeur() != "administrateur"){
				array_push($this->messagesErreur,"Vous êtes déjà déconnecté.");
				return "pageAccueil";
			}elseif ($this->getActeur() == "administrateur"){
				unset($_SESSION['adminConnecte']);
				$this->acteur = "visiteur";
			
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
				return "pageAccueil";
			}
		}

	}	
	
?>