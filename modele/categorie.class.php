<?php
		class categorie {
			//Attributs
			private $id;
			private $nom;
			private $url;

			//constructeur
			public function __construct($id,$nom,$url){
				$this->id=$id;
				$this->nom=$nom;
				$this->url=$url;
			}
			//Accesseurs
			public function getID(){return $this->id;}
			public function getNom(){return $this->nom;}
			public function getUrl(){return $this->url;}

			//Autre méthodes

			//Affichage

			public function __toString(){
				return $this->nom.", ".$this->url." [#".$this->id."]";
			}
		}