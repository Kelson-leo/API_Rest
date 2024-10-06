<?php 

namespace App\Controller;
use App\Entity\Game;

class GameController
{
	
	//POST - Cria um novo game
	function create($data = null)
	{
		return json_encode(["name" => "create"]);
	}

	//PUT - Altera um game
	function update($id = 0, $data = null)
	{
		return json_encode(["name" => "update"]);
	}

	//DELETE - Remove um game
	function delete($id = 0) //getById
	{
		return json_encode(["name" => "delete - {$id}"]);
	}

	//GET - Retorna um game pelo ID
	function readById($id = 0) //getById
	{
		return json_encode(["name" => "readById - {$id}"]);
	}

	//GET - Retorna todos os games
	function readAll() //getAll
	{
		return json_encode(["name" => "readAll"]);
	}
}

 ?>