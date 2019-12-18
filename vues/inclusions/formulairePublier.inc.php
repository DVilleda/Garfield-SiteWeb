<h1>Publier ou Supprimer une Image</h1>
<div id="zonePublication">
	<form action="" method="post">
		<label>Opération</label>
		<input class="radio" type="radio" name="operation" value="inserer"   checked="checked">Inserer une image<br/>
		<input class="radio" type="radio" name="operation" value="supprimer"                   >Supprimer une image<br/><br/>
		
		<label for="numero">Numéro de l'image</label>
		<input id="numero"    name="numero"    type="text"     size="30" />
		
		<label for="url">url de l'image</label>
		<input id="url"    name="url"    type="text"     size="30" />
		
		<label for="titre">Titre de l'image</label>
		<input id="titre"    name="titre"    type="text"     size="30" />
		
		<select name="categorie" id="categorie">
			<option value="1">Garfield</option>
			<option value="2">Im Sorry Jon</option>
			<option value="3">Garfriend</option>
			<option value="4">FanFiction</option>
			<option value="5">Wholesome Garfield</option>
			<option value="6">Nermal</option>
			<option value="7">Garfield Kart</option>
			<option value="8">Cool Garfield</option>
		</select>
		
		<input type="Submit" value="Effectuer" />
	</form>	
</div>