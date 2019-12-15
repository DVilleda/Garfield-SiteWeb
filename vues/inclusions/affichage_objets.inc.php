<?php
//include_once("../../modele/enseignant.class.php");

function afficherListeEnseignants($tabEnseignants) {
	echo "<h1>Liste des enseignants</h1>";
	echo "<ul>";
	foreach ($tabEnseignants as $prof){
		echo "<li>".$prof."</li>";
	}
	echo "</ul>";
}

function afficherListeEvaluations($tabEvals) {
	echo "<h1>Evaluations pour l'enseignant: ".$tabEvals[0]->getProf()."</h1>";
	echo "<table>";
	echo "<thead><th>Cours</th><th>Catégorie</th><th>Description</th><th>Pondération (%)</th></thead>";
	echo "<tbody>";
	foreach ($tabEvals as $eval ) {
		echo "<tr><td>".$eval->getCodeCours()."</td><td>".$eval->getCategorie()."</td><td>".$eval->getDescription()."</td><td>".$eval->getPoids()."</td></tr>";
	}
	echo "</tbody>";
	echo "</table>";
}

?>