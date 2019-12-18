<?php
		class Image {
			// Attributs
			private $id;
			private $url;
			private $titreImage;
			private $pointage;
			private $categorie;
			// Constructeur
			public function __construct($id,$url,$titre,$pointage,$categorie){
				$this->id = $id;
				$this->url = $url;
				$this->titre = $titre;
				$this->pointage = 0;
				$this->categorie = $categorie;
			}
			// Accesseur
			public function getUrl(){return $this->url;}
			public function getTitre(){return $this->titre;}
			public function getID(){return $this->id;}
			public function getPointage(){return $this->pointage;}
			public function getCategorie(){return $this->categorie;}
			public function like(){
				$this->pointage = $pointage++;
			}
			// Autre Methode

			// Affichage
			public function __toString(){
				return $this->titre."||".$this->id."||".$this->url."||".$this->pointage;
			}
		}

?>