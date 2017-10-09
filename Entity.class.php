<?php
abstract class Entity
{
	//champs
	private $id;
	private $nom;
	
	//constructeur parmètré
	public function __construct($id=null, $nom=null)	
	{
		if($id!=null && $nom!=null)
		{
			$this->id=$id;
			$this->nom=$nom;
		}
		
	}

	//méthode get
	public function __get($propriete)
	{
		switch ($propriete) 
		{
			case 'id':
				return $this->id;
				break;
			case 'nom':
				return $this->nom;
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
			case 'id':
				$this->id=$value;
				break;
			case 'nom':
				$this->nom=$value;
				break;
			default:
				throw new Exception("Erreur!!!");
				break;
		}
	}
	//méthode toString()

	public function __tostring()
	{
		return "
			<table>
			<tr>
				<th>ID</th>
				<th>Artist</th>
			</tr>
			<tr>
				<td>".$this->id."</td>
				<td>".$this->nom."</td>
			</tr>
			</table>";
		
	}
}
?>