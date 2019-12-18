<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ImagesDAO.class.php");

	class ImageFull extends  Controleur {
		
		// *******Attributs
		private $image = array();
		private $id =1;

		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// *******Fonction pour obtenir images
		public function getImages() { return $this->image; }
		
		// ******************* Méthode exécuter action
		public function executerAction() {
			$filtre="WHERE id=".$this->id;
			$this->image = ImagesDAO::chercherAvecFiltre($filtre);
			
			return "pageImage";
		}
		
	
	}	

?>