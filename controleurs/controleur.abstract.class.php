<?php
	abstract class Controleur {
		// ******************* Attributs 
		protected $messagesErreur = array();
		protected $acteur = "visiteur";
		
		// ******************* Constructeur qui appelle la méthode determinerActeur
		public function __construct() {
			$this->determinerActeur();
		}
		
		// ******************* Accesseurs 
		public function getMessagesErreur() { return $this->messagesErreur; }
		public function getActeur() { return $this->acteur;}

		// ******************* Méthode abstraite executer action
		abstract public function executerAction();
		
		// ******************* Méthode qui détermine l'acteur en fonction des variables de session
		private function determinerActeur() {
			session_start();
			if(ISSET($_SESSION['adminConnecte'])){
				$this->acteur = "administrateur";
			}else if(ISSET($_SESSION['usagerConnecte'])){
				$this->acteur = "usager";
			}
		}
	}
	
?>