<?php

class Artist extends Entity
{
	private $lesAlbums;
	//constructeur parmètré
	public function __construct($id=null, $nom=null)
	{
		parent::__construct($id,$nom);
		if($id!=null && $nom!=null)
		{
			$this->lesAlbums=array();
		}
		
	}

	//méthode get
	public function __get($propriete)
	{
		switch ($propriete) 
		{
			case 'lesAlbums':
				return $this->lesAlbums;
				break;

			default:
				throw new Exception("Erreur!!!");
				
				break;
		}
	}




	//méthode set
	public function __set($propriete, $value)
	{
		switch ($propriete) 
		{
			case 'lesAlbums':
				$this->lesAlbums=$value;
				break;
			default:
				throw new Exception("Erreur!!!");
				break;
		}
	}

	//on ajout des albums
	public function AjouteAlbum($album)
	{
		$this->lesAlbums[]=$album;
	}

	public static function getAll()
	{
		$sql="select * from artiste";
		$req = MonPdo::getInstance()->query($sql);
		$lesArts = $req->fetchAll(PDO:: FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Artist");
		return $lesArts;
	}

	//on ajoute un artiste
	public static function AjouterArtist($nom)
	{
		$art = "insert into artiste (nom) values('".$nom."')";
		$result = MonPdo::getInstance()->exec($art);
		return $result;
	}

	//on supprime un artiste
	public static function SupprimerArtist($id)
	{
		$art = "delete from artiste where id = ".$id;
		$result = MonPdo::getInstance()->exec($art);
		return $result;
		
	}

	public static function FindByID($id)
	{
		$art = "select * from artiste where id = ".$id;
		$req = MonPdo::getInstance()->query($art);
		$result = $req->fetchAll(PDO:: FETCH_CLASS, "Artist");
		return $result;
	}

}
?>