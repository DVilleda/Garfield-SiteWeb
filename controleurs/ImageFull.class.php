<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ImagesDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/CommentaireDAO.class.php");

	class ImageFull extends  Controleur {
		
		// *******Attributs
		private $image = array();
		private $id;
		private $tabComments = array();
		private $comment=null;

		// ******************* Constructeur vide
		public function __construct($unId) {
			parent::__construct();
			$this->id = substr($unId,9);
		}
		
		// *******Fonction pour obtenir images
		public function getImages() { return $this->image; }
		public function getComments() { return $this->tabComments; }
		public function setComment($unComment){$this->comment=$unComment;}
		
		// ******************* Méthode exécuter action
		public function executerAction() {
			$filtre="WHERE id=".$this->id;
			$this->image = ImagesDAO::chercherAvecFiltre($filtre);
			$filtre="WHERE id=".$this->image[0]->getCategorie();
			$this->tabComments = CommentaireDAO::chercherAvecFiltre($filtre);
			
			$valide = $this->validerPOST();
			if($valide){
				if($this->getActeur() == "usager"){
					$comment = new Commentaire(1,$_POST['comment'],$_SESSION['usagerConnecte']);
					CommentaireDAO::inserer($comment);
				}else if($this->getActeur() == "administrateur"){
					$comment = new Commentaire(1,$_POST['comment'],$_SESSION['adminConnecte']);
					CommentaireDAO::inserer($comment);
				}
			}
			return "pageImage";
		}
		
		// ****************** Validation
		private function validerPOST() {
			$valide = true;
			$listeParametres = ['id','commentaire','usager_pseudonyme'];
			if (! ISSET($_POST['comment'])) {
				$valide = false;
			}else {
				if($_POST['comment'] == "" ){
					$valide = false;
				}
			}
			return $valide;
		}
	
	}	

?>