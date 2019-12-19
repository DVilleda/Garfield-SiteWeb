<h1>Publier ou Supprimer une Image</h1>
<div id="zonePublication">
	<form action="" method="post">
		<label>Opération: </label><br/><br/>
		<label>Inserer une image</label>
		<input type="radio" name="operation" value="inserer"   checked="checked"><br/>
		<label>Supprimer une image</label>
		<input type="radio" name="operation" value="supprimer"><br/>
		
		<label for="numero">Numéro de l'image</label>
		<input name="numero"    type="text"     size="30" /><br/>
		
		<label for="url">url de l'image</label>
		<input name="url"    type="text"     size="30" /><br/>
		
		<label for="titre">Titre de l'image</label>
		<input name="titre"    type="text"     size="30" /><br/>
		
		<label>Catégorie: </label>
		<select name="categorie">
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