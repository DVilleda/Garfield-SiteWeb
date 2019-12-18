<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/UsagerDAO.class.php");

	class CreerCompte extends  Controleur {
		// ******************* attributs
		private $unUsager;
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// ******************* Méthode exécuter action
		public function executerAction() {
			if ($this->getActeur() == "visiteur") {
				return "pageNewUser";
			}else {
				array_push($this->messagesErreur,"Vous devez vous deconnecter.");
				return "pageAccueil";
			}
			
			$valide = $this->validerPOST();
			if ($valide) {
			$unUsager = new Usager($_POST['pseudonyme'], $_POST['prenom'], $_POST['nom'], $_POST['mot_passe']);
			UsagerDAO::inserer($unUsager);
			return "pageAccueil";
			}
		}
		
		private function validerPOST() {
			$valide = true;
			$listeParametres = ['pseudo','prenom','nom','mot_passe','moderateur'];
			if (! ISSET($_POST['pseudo']) || ! ISSET($_POST['mot_passe'])) {
				$valide = false;
			} else  {
					if ($_POST['pseudo'] == "" || $_POST['mot_passe'] == "") {
						$valide = false;
					}
					
			}
			return $valide;
		}
	}	

?>