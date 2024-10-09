<?php 

namespace App\Model;
use App\Entity\Game;
use App\Util\Serialize;

class GameModel 
{
	private $fileName;
	private $listGame = []; //Object type Game

	public function __construct()
	{
		$this->fileName = "../database/carro.db";
		$this->load();
	}

	public function readAll(){
		return (new Serialize())->serialize($this->listGame);
	}


	public function create(Game $game) {
		$this->listGame[] = $game;
		$this->save();
		return "Okay";
	}

	private function save() {
		$temp = [];

		foreach ($this->listGame as $g) {
			$temp [] = [
				"id" => $g->getId(),
				"titulo"=> $g->getTitulo(),
				"descricao" =>$g-> getDescricao(),
				"videoid" =>$g-> getVideoid()
			];
			
			$fp = fopen($this->fileName, "w"); //faz escrita no banco/"arquivo"(database/carro.db)

			fwrite($fp, json_encode($temp));
			fclose($fp);
		}
	}

	//Internal method
	private function load() {
		if(!file_exists($this->fileName) || filesize($this->fileName) <= 0)
			return [];

		$fp = fopen($this->fileName, "r");
		$str = fread($fp, filesize($this->fileName));
		fclose($fp);

		$arrayGame = json_decode($str);

		foreach($arrayGame as $g){
			$this->listGame[] = new Game(
				$g->id,
				$g->titulo,
				$g->descricao,
				$g->videoid
			);
		}
	}
}


?>