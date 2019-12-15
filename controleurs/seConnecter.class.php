<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/administrateurDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");

	class SeConnecter extends  Controleur {

		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- VÉRIFIER LE TYPE D'ACTEUR -----------
			if($this->getActeur() == "administrateur"){
				return "pageAccueil";
			}
			//----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS ET SE CONNECTER AU BESOIN ------
			$valide = $this->validerPOST();
			if($valide){
				$numero = $_POST['numero'];
				$motPasse = $_POST['motPasse'];
				$admin = AdministrateurDAO::chercherParNumeroMotPasse($numero,$motPasse);
				if(ISSET($admin)){
					$this->acteur = "administrateur";
					$_SESSION['adminConnecte']=$numero;
					return "pageAccueil";
				}else if(!ISSET($admin)){
					array_push($this->messagesErreur,"Le mot passe et/ou le numéro d’employé sont invalides.");
					return "pageConnexion";
				}
			}else{
				return "pageConnexion";
			}
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
			
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