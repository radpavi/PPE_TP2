<?php 
try
{
	include("Monpdo.php");
	include("Album.class.php");
	$monpdo = MonPdo::getInstance();

	//on récupére le nom saisi par l'internaut
	$titre=$_POST['titre'];
	$annee=$_POST['annee'];
	$genre=$_POST['genre'];

	//on affiche le dernier Identifiant ajouté
	$id=$monpdo->lastInsertId();
	echo "Identifiant: ".$id;
	
	if (!empty ( $_GET ['action']))
	{
		if($_GET['action']=="afficher")
		{
			$listeArts=Artist::getAll();
			echo $$listeArts;
		}
		echo "<a href=ListeAlbums.php>RETOUR</a>";
	}
	

	//on ferme la connexion
	$monpdo=null;
}
catch(PDOException $e)
{
	echo $e->getMessage ();
	$monpdo=null;
}
 ?>