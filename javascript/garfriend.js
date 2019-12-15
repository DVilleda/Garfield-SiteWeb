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
function changerJon(){

	var couleur = document.getElementById("corps");
	var choisi = document.getElementsByClassName("garfieldChoisi");
	choisi[0].classList.add("nonChoisi");
	choisi[0].classList.remove("garfieldChoisi");
	couleur.classList.add("jon");
	couleur.classList.remove("garfield");
	couleur.classList.remove("nermal");
	couleur.classList.remove("wholesome");
	
	
	event.target.classList.add("garfieldChoisi");
	event.target.classList.remove("nonchoisi");
}
function changerGarfield(){
	var couleur = document.getElementById("corps");
	var choisi = document.getElementsByClassName("garfieldChoisi");
	choisi[0].classList.add("nonChoisi");
	choisi[0].classList.remove("garfieldChoisi");
	couleur.classList.add("garfield");
	couleur.classList.remove("jon");
	couleur.classList.remove("nermal");
	couleur.classList.remove("wholesome");
	
	
	event.target.classList.add("garfieldChoisi");
	event.target.classList.remove("nonchoisi");
}
function changerNermal(){

	var couleur = document.getElementById("corps");
	var choisi = document.getElementsByClassName("garfieldChoisi");
	choisi[0].classList.add("nonChoisi");
	choisi[0].classList.remove("garfieldChoisi");
	couleur.classList.add("nermal");
	couleur.classList.remove("garfield");
	couleur.classList.remove("jon");
	couleur.classList.remove("wholesome");
	
	event.target.classList.add("garfieldChoisi");
	event.target.classList.remove("nonchoisi");
}
function changerWholesome(){
		var couleur = document.getElementById("corps");
	var choisi = document.getElementsByClassName("garfieldChoisi");
	choisi[0].classList.add("nonChoisi");
	choisi[0].classList.remove("garfieldChoisi");
	couleur.classList.add("wholesome");
	couleur.classList.remove("garfield");
	couleur.classList.remove("jon");
	couleur.classList.remove("nermal");
	
	event.target.classList.add("garfieldChoisi");
	event.target.classList.remove("nonchoisi");
}