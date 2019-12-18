<?php
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/config/configBD.interface.php");
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
		include_once(DOSSIER_BASE_INCLUDE."modele/categorie.class.php");

		class CategorieDAO implements DAO{
			public static function chercher($cles) { 
				try {
					$connexion=ConnexionDB::getInstance();
				} catch (Exception $e) {
					throw new Exception("Impossible d’obtenir la connexion à la BD."); 
				}

			// valeur par défaut pour la variable à retourner si non-trouvée
				$uneCategorie=null; 
			
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
				$requete= $connexion->prepare("SELECT * FROM categorie WHERE id=?");

			// Exécuter la requête avec le paramètre
				$requete->execute(array($cles));			
			
			// Analyser l’enregistrement, s’il existe, et créer l’instance du administrateur
			// note on pourait aussi lancer une exception si on a plus d’un résultat …
				if ($requete->rowCount() > 0) {
					$enregistrement=$requete->fetch();
					$uneCategorie=new Categorie($enregistrement['id'], $enregistrement['nom'], $enregistrement['url']);
			}
			// fermer le curseur de la requête et la connexion à la BD
				$requete-> closeCursor();
				ConnexionDB::close();	
		  
				return $uneCategorie;	 
			}

			static public function chercherTous(){
				return self::chercherAvecFiltre("");
			}

			static public function chercherAvecFiltre($filtre){
				try {
					$connexion=ConnexionDB::getInstance();
				} catch (Exception $e) {
					throw new Exception("Impossible d’obtenir la connexion à la BD."); 
				}
			// initialisation du tableau vide
				$liste = array(); 
				
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
				$requete= $connexion->prepare("SELECT * FROM categorie ".$filtre);

			// Exécuter la requête
				$requete-> execute();			

			// Analyser les enristrements s'il y en a 
				foreach ($requete as $enregistrement) {
					$uneCategorie=new Categorie($enregistrement['id'], $enregistrement['nom'], $enregistrement['url']);
					array_push($liste, $uneCategorie);
			}
			// fermer le curseur de la requête et la connexion à la BD
				$requete-> closeCursor();
				ConnexionDB::close();	
		
				return $liste;
			}

			static public function inserer($uneCategorie){
				try{
					$connexion=ConnexionDB::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}
				$requete = $connexion->prepare("INSERT INTO categorie (id,nom,url) VALUES (?,?,?)");
				ConnexionDB::close();
				return $requete-> execute(array($uneCategorie->getID(), $uneCategorie->getNom(), $uneCategorie->getUrl()));
			}


			static public function modifier($uneCategorie){
				try{
					$connexion=ConnexionDB::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}
				$commandeSQL = "UPDATE categorie SET nom='".$uneCategorie->getNom()."',url='".$uneCategorie->getUrl();
				$commandeSQL .=" WHERE id=".$uneCategorie->getID();
				$requete = $connexion->prepare($commandeSQL);
				ConnexionDB::close();
				return $requete->execute();
			}

			static public function supprimer($uneCategorie){
				try{
					$connexion=ConnexionDB::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}

				$commandeSQL = "DELETE FROM categorie WHERE id=".$uneCategorie->getID();
				$requete = $connexion->prepare($commandeSQL);
				ConnexionDB::close();	
				return	$requete->execute();
			}
		}
?>