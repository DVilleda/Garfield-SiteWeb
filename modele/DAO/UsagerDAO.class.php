<?php
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/config/configBD.interface.php");
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
		include_once(DOSSIER_BASE_INCLUDE."modele/usager.class.php");

		class UsagerDAO implements DAO{
			public static function chercher($cles) { 
				try {
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e) {
					throw new Exception("Impossible d’obtenir la connexion à la BD."); 
				}

			// valeur par défaut pour la variable à retourner si non-trouvée
				$unUsager=null; 
			
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
				$requete= $connexion->prepare("SELECT * FROM usager WHERE pseudonyme=?");

			// Exécuter la requête avec le paramètre
				$requete->execute(array($cles));			
			
			// Analyser l’enregistrement, s’il existe, et créer l’instance du administrateur
			// note on pourait aussi lancer une exception si on a plus d’un résultat …
				if ($requete->rowCount() > 0) {
					$enregistrement=$requete->fetch();
					$unUsager=new Usager($enregistrement['pseudonyme'], $enregistrement['prenom'], $enregistrement['nom'],
									$enregistrement['mot_passe']);
			}
			// fermer le curseur de la requête et la connexion à la BD
				$requete-> closeCursor();
				ConnexionBD::close();	
		  
				return $unUsager;	 
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
				$requete= $connexion->prepare("SELECT * FROM usager ".$filtre);

			// Exécuter la requête
				$requete-> execute();			

			// Analyser les enristrements s'il y en a 
				foreach ($requete as $enregistrement) {
					$unUsager=new Usager($enregistrement['pseudonyme'], $enregistrement['prenom'], $enregistrement['nom'],
									$enregistrement['mot_passe']);
					array_push($liste, $unUsager);
			}
			// fermer le curseur de la requête et la connexion à la BD
				$requete-> closeCursor();
				ConnexionBD::close();	
		
				return $liste;
			}

			static public function inserer($unUsager){
				try{
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}
				$requete = $connexion->prepare("INSERT INTO usager (pseudonyme,prenom,nom,mot_passe,moderateur,points) VALUES (?,?,?,?,?,?)");
				ConnexionBD::close();
				return $requete-> execute(array($unUsager->getPseudonyme(), $unUsager->getPrenom(), $unUsager->getNom(), $unUsager->getMotPasse(),$unUsager->getModerateur(),$unUsager->getPoints()));
			}

			static public function modifier($unUsager){
				try{
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}
				$commandeSQL = "UPDATE usager SET prenom='".$unUsager->getPrenom()."',nom='".$unUsager->getNom();
				$commandeSQL .= "',mot_passe=".$unUsager->getMotPasse()."WHERE pseudonyme=".$unUsager->getPseudonyme();
				$requete = $connexion->prepare($commandeSQL);
				ConnexionBD::close();
				return $requete->execute();
			}

			static public function supprimer($unUsager){
				try{
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}

				$commandeSQL = "DELETE FROM usager WHERE pseudonyme=".$unUsager->getPseudonyme();
				$requete = $connexion->prepare($commandeSQL);
				ConnexionBD::close();	
				return	$requete->execute();
			}

			static public function chercherParPseudoMotPasse($unPseudo, $unMotPasse){
				$unUsager=null;
				try{
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}
				$requete = $connexion->prepare("SELECT * FROM usager WHERE pseudonyme=? AND mot_passe=?");
				$requete->execute(array($unPseudo,$unMotPasse));
				foreach ($requete as $enregistrement) {
					$unUsager=new Usager($enregistrement['pseudonyme'], $enregistrement['prenom'], $enregistrement['nom'], $enregistrement['mot_passe'], $enregistrement['moderateur']);
				}
				$requete->closeCursor();
				ConnexionBD::close();
				return $unUsager;
			}
			static public function chercherModerateur(){
				$unUsager=null;
				try{
					$connexion=ConnexionBD::getInstance();
				} catch (Exception $e){
					throw new Exception ("Impossible d’obtenir la connexion à la BD.");
				}
				$requete = $connexion->prepare("SELECT * FROM usager WHERE (moderateur='Y'");
				$requete->execute(array($unPseudo,$unMotPasse));
				foreach ($requete as $enregistrement) {
					$unUsager=new Usager($enregistrement['pseudonyme'], $enregistrement['prenom'], $enregistrement['nom'], $enregistrement['mot_passe']);
				}
				$requete->closeCursor;
				ConnexionBD::close();
				return $unUsager;
			}
		}

?>