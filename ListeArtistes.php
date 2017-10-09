<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Artistes</title>
	</head>
	
	<body bgcolor="lightblue">
		<h1>Ajouter un artiste</h1>
			<form method="POST" action="ModifArtiste.php">
        		<label for=nom>Saisir le nom d'un artiste à ajouter : </label> <input type="text" id= "nom" name="nom" placeholder= "Saisissez un nom d'artiste"/>
        		<input type="submit" name="ok" value="Ajouter l'artiste"/>
			</form>
	</body>
</html>

<?php 
try
{
	include("Monpdo.php");
	include("Artiste.class.php");

//on affiche la liste d'artiste
	$listeArts=Artist::getAll();
	echo "<h1>La liste d'artistes</h1>
		<table>
			<tr>
				<th>ID</th>
				<th>Artist</th>
			</tr>";
	foreach ($listeArts as $a) 
	{
		echo "<tr>
				<td>".$a->id."</td>
				<td>".$a->nom."</td>
				<td> <a href = 'ModifArtiste.php'?action=afficher>Afficher</a> </td>
				<td> <a href = 'ModifArtiste.php'?action=supprimer>Supprimer</a> </td>
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