<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ImagesDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/CommentaireDAO.class.php");

	class BasicGarfield extends  Controleur {
		
		// *******Attributs
		private $image = array();
		private $tabComments = array();
		private $compteur =0;

		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// *******Fonction pour obtenir images
		public function getImages() { return $this->image; }
		public function getCompteur() { return $this->compteur; }
		public function getComments() { return $this->tabComments; }
		public function suivant() {$this->compteur ++;}
		public function precedent() {$this->compteur += -1;}
		
		// ******************* Méthode exécuter action
		public function executerAction() {
			$filtre="WHERE categorie_id=1";
			$this->image = ImagesDAO::chercherAvecFiltre($filtre);
			$filtre="WHERE id=1";
			$this->tabComments = CommentaireDAO::chercherAvecFiltre($filtre);
			
			return "pageGarfield";
		}
		
	
	}	

?>