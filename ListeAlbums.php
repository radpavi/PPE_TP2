<?php 
	include("Entete.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	
	<body bgcolor="lightblue">
		<h1>Ajouter un album</h1>
			<form method="POST" action="ModifAlbums.php">
        		<label for=titre>Titre : </label> <input type="text" id= "titre" name="titre" placeholder= "Saisissez un titre"/>
        		<br><br>
        		<label for=annee>Année : </label> <input type="number" id= "annee" name="annee" placeholder= "Saisissez une année"/>
				<br><br>
        		<label for=genre>Genre : </label> <input type="text" id= "genre" name="genre" placeholder= "Saisissez un genre"/>
        		<br><br>
        		<label for=artiste>Artiste : </label>

        		<SELECT name="artiste" id= "artiste" size="1">
					<option>KK</option>
				</SELECT>
				<br><br>
        		<input type="submit" name="ok" value="Ajouter l'lbum"/>
			</form>
	</body>
</html>

<?php 
try
{
	include("Monpdo.php");
	include("Album.class.php");

	//on affiche la liste d'albums
	$listeAlbum=Album::getAll();
	echo "<h1>La liste d'albums</h1>
		<table>
			<tr>
				<th>ID</th>
				<th>Album</th>
			</tr>";
	foreach ($listeAlbum as $al) 
	{
		echo "<tr>
				<td>".$al->id."</td>
				<td>".$al->nom."</td>
				<td>".$al->annee."</td>
				<td>".$al->genre."</td>
				<td> <a href = 'ModifAlbums.php'?action=afficher>Afficher</a> </td>
				<td> <a href = 'ModifAlbums.php'?action=supprimer>Supprimer</a> </td>
			</tr>";
	}
	echo "</table>";
	

	//on ferme la connexion
	$monpdo=null;
}
catch(PDOException $e)
{
	echo $e->getMessage ();
	$monpdo=null;
}
 ?>