<?php
		include_once(DOSSIER_BASE_INCLUDE."modele/DAO/config/configBD.interface.php");
		include_once(DOSSIER_BASE_INCLUDE.'modele/DAO/connexionBD.class.php');

		interface DAO {

			// fonction qui perfet de retourner l'objet dont la clé primaire à été reçu.
			// retourne null si non trouvé
			static public function chercher($cles);

			// fonction qui cherche tout et retourne une liste d'objet.
			static public function chercherTous();

			// fonction qui cherche tous, mais avec un filtre.
			static public function chercherAvecFiltre($filtre);

			// fonction qui insere un objet dans la table.
			static public function inserer($unObjet);

			// fonction qui modifie un objet existant.
			static public function modifier($unObjet);

			// fonction qui supprime un objet existant.
			static public function supprimer($unObjet);
		}
?>