<?php
    //----------------------------- INCLUSIONS
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/usagerDAO.class.php");
	include_once(DOSSIER_BASE_INCLUDE."controleurs/controleur.abstract.class.php");

	class SeConnecter extends  Controleur {

		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
		}
		
		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- VÉRIFIER LE TYPE D'ACTEUR -----------
			if($this->getActeur() == "administrateur" || $this->getActeur() == "usager" ){
				return "pageAccueil";
			}
			//----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS ET SE CONNECTER AU BESOIN ------
			$valide = $this->validerPOST();
			
			if($valide){
				$pseudonyme = $_POST['pseudonyme'];
				$motPasse = $_POST['motPasse'];
				$usager = UsagerDAO::chercherParPseudoMotPasse($pseudonyme,$motPasse);
				if(ISSET($usager) && $usager->getModerateur()=="Y"){
					$this->acteur = "administrateur";
					$_SESSION['adminConnecte']=$pseudonyme;
					return "pageAccueil";
				}else if(ISSET($usager) && $usager->getModerateur()=="N"){
					$this->acteur = "usager";
					$_SESSION["usagerConnecte"]=$pseudonyme;
					return "pageAccueil";
				}else if(!ISSET($usager)){
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
			$listeParametres = ['pseudonyme','prenom','nom','mot_passe','moderateur','points'];
			if (! ISSET($_POST['pseudonyme']) || ! ISSET($_POST['motPasse'])) {
				$valide = false;
			} else  {
					if ($_POST['pseudonyme'] == "" || $_POST['motPasse'] == "") {
						$valide = false;
					}
					
			}
			return $valide;
		}
	}	

?>