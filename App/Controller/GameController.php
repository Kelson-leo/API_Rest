<?php 

namespace App\Controller;
use App\Entity\Game;
use App\Model\GameModel;

class GameController
{
	private $gameModel;

	public function __construct()
	{
		$this->gameModel = new GameModel();	
	}

	//POST - Cria um novo game
	function create($data = null)
	{	
		$game = $this->convertType($data);
		$result = $this->validate($game);

		if($result != "") {
			echo json_encode(["result"=> $result]);
		}

		$this->gameModel->create($game);
	}

	//PUT - Altera um game
	function update($id = 0, $data = null)
	{
		$game = $this->convertType($data);
		$game->setId($id);
		$result = $this->validate($game, true);

		if($result != "") {
			echo json_encode(["result"=> $result]);
		}
		
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

	private function convertType($data) {
		return new Game(
			null,
			(isset($data['titulo']) ? $data['titulo'] : null),
			(isset($data['descricao']) ? $data['descricao'] : null),
			(isset($data['videoid']) ? $data['videoid'] : null)
			 //o "ID" vem por parâmtro, e o "data" vem via POST, PUT etc. por isso não é especificado aqui
		);
	}

	private function validate(Game $game, $update = false){ //recebe variavel $game da classe Game
		if($update && $game->getId() <=0) {
			return "invalid id";
		}
		if(strlen($game->getTitulo()) < 4 || strlen($game->getTitulo()) > 100) {
			return "invalid titulo";
		}
		if(strlen($game->getDescricao()) < 10 || strlen($game->getDescricao()) > 250) {
			return "invalid descricao";
		}
		if(strlen($game->getVideoid()) == "" || strlen($game->getVideoid()) > 15) {
			return "invalid descricao";
		}
		return "";
	}
}

 ?>

