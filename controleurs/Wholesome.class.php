<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");

	class Wholesome extends  Controleur {

		// *******Attributs
		private $image = array();
		private $compteur =0;

		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// *******Fonction pour obtenir images
		public function getImages() { return $this->image; }
		public function getCompteur() { return $this->compteur; }
		public function suivant() {$this->compteur ++;}
		public function precedent() {$this->compteur += -1;}
		
		// ******************* Méthode exécuter action
		public function executerAction() {
			$filtre="WHERE categorie_id=5";
			$this->image = ImagesDAO::chercherAvecFiltre($filtre);
			
			return "pageWholesome";
			
		}
	}	

?>