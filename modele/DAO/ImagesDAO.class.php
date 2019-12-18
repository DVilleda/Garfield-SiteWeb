<?php
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/config/configBD.interface.php");
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
		include_once(DOSSIER_BASE_INCLUDE."modele/Image.class.php");

		class ImagesDAO implements DAO{
			public static function chercher($cles) { 
				try {
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e) {
					throw new Exception("Impossible d’obtenir la connexion à la BD."); 
				}

			// valeur par défaut pour la variable à retourner si non-trouvée
				$uneImage=null; 
			
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
				$requete= $connexion->prepare("SELECT * FROM images WHERE id=?");

			// Exécuter la requête avec le paramètre
				$requete->execute(array($cles));			
			
			// Analyser l’enregistrement, s’il existe, et créer l’instance du administrateur
			// note on pourait aussi lancer une exception si on a plus d’un résultat …
				if ($requete->rowCount() > 0) {
					$enregistrement=$requete->fetch();
					$unImage=new Image($enregistrement['id'], $enregistrement['url'], $enregistrement['titre_image'], $enregistrement['pointage'], $enregistrement['categorie_id']);
			}
			// fermer le curseur de la requête et la connexion à la BD
				$requete-> closeCursor();
				ConnexionBD::close();	
		  
				return $uneImage;	 
			}

			static public function chercherTous(){
				return self::chercherAvecFiltre("");
			}

			static public function chercherAvecFiltre($filtre){
				try {
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e) {
					throw new Exception("Impossible d’obtenir la connexion à la BD."); 
				}
			// initialisation du tableau vide
				$liste = array(); 
				
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
				$requete= $connexion->prepare("SELECT * FROM images ".$filtre);

			// Exécuter la requête
				$requete-> execute();			

			// Analyser les enristrements s'il y en a 
				foreach ($requete as $enregistrement) {
					$uneImage=new Image($enregistrement['id'], $enregistrement['url'], $enregistrement['titre_image'], $enregistrement['pointage'], $enregistrement['categorie_id']);
					array_push($liste, $uneImage);
			}
			// fermer le curseur de la requête et la connexion à la BD
				$requete-> closeCursor();
				ConnexionBD::close();	
		
				return $liste;
			}

			static public function inserer($uneImage){
				try{
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}
				$requete = $connexion->prepare("INSERT INTO images (id,url,titre_image,pointage,categorie_id) VALUES (NULL,?,?,?,?)");
				return $requete-> execute(array($uneImage->getUrl(), $uneImage->getTitre(), $uneImage->getPointage(), $uneImage->getCategorie()));
				ConnexionBD::close();
			}


			static public function modifier($uneImage){
				try{
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}
				$commandeSQL = "UPDATE images SET titre_image='".$uneImage->getTitre()."',url='".$uneImage->getUrl();
				$commandeSQL .=" WHERE id=".$uneImage->getID();
				$requete = $connexion->prepare($commandeSQL);
				ConnexionBD::close();
				return $requete->execute();
			}

			static public function supprimer($uneImage){
				try{
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}

				$commandeSQL = "DELETE FROM images WHERE id=".$uneImage->getID();
				$requete = $connexion->prepare($commandeSQL);
				return	$requete->execute();
				ConnexionBD::close();
			}
		}
?>