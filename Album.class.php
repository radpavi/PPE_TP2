<?php
include("Entity.class.php");
class Album extends Entity
{
	//champs
	private $annee;
	private $genre;

	//constructeur paramètré
	public function __construct($id=null,$nom=null,$annee=null,$genre=null)
	{ 
		parent::__construct($id,$nom);
		if($id!=null && $nom!=null)
		{
			$this->annee=$annee;
			$this->genre=$genre;
		}
	}
	//méthode get
	public function __get($propriete)
	{
		switch ($propriete) 
		{
			case 'annee':
				return $this->annee;
				break;
			case 'genre':
				return $this->genre;
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
			case 'annee':
				$this->annee=$value;
				break;
			case 'genre':
				$this->genre=$value;
				break;

			default:
				throw new Exception("Erreur!!!");
				
				break;
		}
	}


	public function __tostring()
	{
		return "L'album est sorti en ".$this->annee;
	}

	public static function getAll()
	{
		$sql="select * from album ";
		$req = MonPdo::getInstance()->query($sql);
		$lesAlbum = $req->fetchAll(PDO:: FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Album");
		return $lesAlbum;
	}

}

?>