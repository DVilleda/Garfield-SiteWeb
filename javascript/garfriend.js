/*Fichier javascript utilisé pour la_queen.html*/
function changercouleur(){
	var classe = document.getElementById("nomSite");
	classe.classList.toggle("bleu")
}

function go(){
	setInterval("changercouleur()", 100);
}

function signaler(){
	alert("                                 PUBLICATION SIGNALÉE \n La publication a été signalée, les modérateurs la vérifieront.")
}

function soumettre() {
	var texte = document.getElementById("holder").value; 
	alert(texte);
}
function aimer(){
	alert("<3");
}
