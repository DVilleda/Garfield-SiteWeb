<?php
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/config/configBD.interface.php");
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
		include_once(DOSSIER_BASE_INCLUDE."modele/commentaire.class.php");

		class CommentaireDAO implements DAO{
			public static function chercher($cles) { 
				try {
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e) {
					throw new Exception("Impossible d’obtenir la connexion à la BD."); 
				}

			// valeur par défaut pour la variable à retourner si non-trouvée
				$unCommentaire=null; 
			
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
				$requete= $connexion->prepare("SELECT * FROM commentaires WHERE id=?");

			// Exécuter la requête avec le paramètre
				$requete->execute(array($cles));			
			
			// Analyser l’enregistrement, s’il existe, et créer l’instance du administrateur
			// note on pourait aussi lancer une exception si on a plus d’un résultat …
				if ($requete->rowCount() > 0) {
					$enregistrement=$requete->fetch();
					$unCommentaire=new Commentaire($enregistrement['id'], $enregistrement['commentaire'], $enregistrement['usager_pseudonyme']);
			}
			// fermer le curseur de la requête et la connexion à la BD
				$requete-> closeCursor();
				ConnexionBD::close();	
		  
				return $unCommentaire;	 
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
				$requete= $connexion->prepare("SELECT * FROM commentaires ".$filtre);

			// Exécuter la requête
				$requete-> execute();			

			// Analyser les enristrements s'il y en a 
				foreach ($requete as $enregistrement) {
					$unCommentaire=new Commentaire($enregistrement['id'], $enregistrement['commentaire'], $enregistrement['usager_pseudonyme']);
					array_push($liste, $unCommentaire);
			}
			// fermer le curseur de la requête et la connexion à la BD
				$requete-> closeCursor();
				ConnexionBD::close();	
		
				return $liste;
			}

			static public function inserer($unCommentaire){
				try{
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}
				$requete = $connexion->prepare("INSERT INTO commentaires (id,commentaire,usager_pseudonyme,numero) VALUES (?,?,?,NULL)");
				ConnexionBD::close();
				return $requete-> execute(array($unCommentaire->getID(), $unCommentaire->getCommentaire(), $unCommentaire->getUtilisateur()));
			}

			static public function modifier($unCommentaire){
				try{
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}
				$commandeSQL = "UPDATE commentaires SET commentaire='".$unCommentaire->getCommentaire()."WHERE id=".$unCommentaire->getID();
				$requete = $connexion->prepare($commandeSQL);
				ConnexionBD::close();
				return $requete->execute();
			}

			static public function supprimer($unCommentaire){
				try{
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}

				$commandeSQL = "DELETE FROM commentaires WHERE id=".$unCommentaire->getID();
				$requete = $connexion->prepare($commandeSQL);
				ConnexionBD::close();	
				return	$requete->execute();
			}
		}
?>