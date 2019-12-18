<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");

	class Publier extends  Controleur {
		
		// *******Attributs
		private $uneImage = null;
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// ******************* Méthode exécuter action
		public function executerAction() {
			if ($this->getActeur() == "visiteur") {
				array_push($this->messagesErreur,"Vous devez vous connecter.");
				return "pageConnexion";
			}
			
			$valide = $this->validerPOST();
			if ($valide) {
				$uneImage = new Image((int)$_POST['numero'], $_POST['url'], $_POST['titre'],0, (int)$_POST['categorie']);
				if ($_POST['operation'] == "inserer") {
					ImagesDAO::inserer($uneImage);
				} elseif ($_POST['operation'] == "supprimer")  {
					ImagesDAO::supprimer($uneImage);
				}else{
					array_push($this->messagesErreur,"Erreur dans la saisie des informations");
				}
			}
			return "pagePublier";
			
		}
		
		private function validerPOST() {
			$valide = true;
			$listeParametres = ['id','url','titre_image','pointage','categorie_id'];
			if (! ISSET($_POST['numero']) || ! ISSET($_POST['titre']) || ! ISSET($_POST['url'])) {
				$valide = false;
			} else  {
					if ($_POST['numero'] == "" || $_POST['titre'] == "" || $_POST['url'] == "") {
						$valide = false;
					}
			}
			return $valide;
		}
	}	

?>