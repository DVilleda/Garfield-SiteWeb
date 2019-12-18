<?php
		class Commentaire {
			// Attributs
			private $id;
			private $commentaire;
			private $pointage;
			private $utilisateur;
			// Constructeur
			public function __construct($id,$commentaire,$utilisateur){
				$this->id = $id;
				$this->commentaire = $commentaire;
				$this->utilisateur = $utilisateur;
			}
			// Accesseur
			public function getCommentaire(){return $this->commentaire;}
			public function getUtilisateur(){return $this->utilisateur;}
			public function getID(){return $this->id;}
			public function getPointage(){return $this->pointage;}
			// Autre Methode

			// Affichage
			public function __toString(){
				return $this->utilisateur."||".$this->commentaire;
			}
		}

?>