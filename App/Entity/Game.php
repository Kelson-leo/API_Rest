<?php 

namespace App\Entity;


class Game
{
	private $id;
	private $titulo;
	private $descricao;
	private $videoid;

	//Constructor
	function __construct($id = 0, $titulo = '', $descricao = '', $videoid = '')
	{
		$this->id=$id;
		$this->titulo=$titulo;
		$this->descricao=$descricao;
		$this->videoid=$videoid;
	}

	//Setters
	public function setId($id) {
		$this->id=$id;
	}

	public function setTitulo($titulo){
		$this->id=$id;
	}

	public function setDescricao($descricao) {
		$this->id=$id;
	}

	public function setVideoId($videoid) {
		$this->videoid=$videoid;
	}
}

 ?>