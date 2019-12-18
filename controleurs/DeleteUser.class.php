<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/UsagerDAO.class.php");

	class DeleteUser extends  Controleur {

		// ******************* attributs
		private $unUsager;
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// ******************* Méthode exécuter action
		public function executerAction() {
			if ($this->getActeur() == "visiteur") {
				array_push($this->messagesErreur,"Vous n'avez pas de permissions pour cela.");
				return "pageAccueil";
			}else if ($this->getActeur() == "usager"){
				array_push($this->messagesErreur,"Vous n'avez pas de permissions pour cela.");
				return "pageAccueil";
			}
				$valide = $this->validerPOST();
				if ($valide) {
				$unUsager = new Usager($_POST['pseudonyme'], $_POST['prenom'], $_POST['nom'], "","N");
				UsagerDAO::supprimer($unUsager);
				}
				return "pageMod";
			
		
		}
		
		private function validerPOST() {
			$valide = true;
			$listeParametres = ['pseudo','prenom','nom','mot_passe','moderateur'];
			if (! ISSET($_POST['pseudonyme']) ) {
				$valide = false;
			} else  {
					if ($_POST['pseudonyme'] == "") {
						$valide = false;
					}
					
			}
			return $valide;
		}
	}	

?>