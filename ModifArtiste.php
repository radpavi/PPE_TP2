<?php 
try
{
	include("Entete.php");
	$monpdo = MonPdo::getInstance();

	//on récupére le nom saisi par l'internaut
	$nom=$_POST['nom'];

	//on ajoute des artistes
	$req= Artist::AjouterArtist($nom);
	//on affiche l'identifiant créé automatiquement
	$id=$monpdo->lastInsertId();
	echo "Identifiant: ".$id;
	if (!empty ( $_GET ['action']))
	{
		if($_GET['action']=="afficher")
		{
			$listeArts=Artist::getAll();
			echo $$listeArts;
		}

		if($_GET['action']=="supprimer")
		{
			$sup=Artist::SupprimerArtist($id);
			if($sup==1)
			{
				
			}
		}
		echo "<a href=ListeArtistes.php>RETOUR</a>";
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