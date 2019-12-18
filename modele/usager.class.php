<?php
		class Usager{
			//Attributs
			private $pseudonyme;
			private $prenom;
			private $nom;
			private $motPasse;
			private $points;
			private $moderateur;

			// Contructeur
			public function __construct($pseudo,$prenom,$nom,$motPasse,$moderateur){
				$this->pseudonyme = $pseudo;
				$this->prenom = $prenom;
				$this->nom = $nom;
				$this->motPasse = $motPasse;
				$this->points = 0;
				$this->moderateur =$moderateur;
			}
			// Accesseurs et mutateurs
			public function getPseudonyme(){return $this->pseudonyme;}
			public function getPrenom(){return $this->prenom;}
			public function getNom(){return $this->nom;}
			public function getMotPasse(){return $this->motPasse;}
			public function getPoints(){return $this->points;}
			public function getModerateur(){return $this->moderateur;}

			public function setModerateur($unModerateur){$this->moderateur=$unModerateur;}

			// Autre méthodes
			public function changerMotPasse($ancien,$nouveau){
				$test = false;
				// bon si au moins 8 caractères.
				if ($ancien == $this->motPasse && strlen($nouveau)>=8){
					$test = true;
					$this->motPasse = $nouveau;
				}
				return $test;
			}

			// Affichage
			public function __toString(){
				return $this->nom.", ".$this->prenom." [".$this->pseudonyme.", Points : ".$this->points."]";
			}
		}
		?>