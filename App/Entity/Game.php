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
		$this->titulo=$titulo;
	}

	public function setDescricao($descricao) {
		$this->descricao=$descricao;
	}

	public function setVideoId($videoid) {
		$this->videoid=$videoid;
	}

	//Getter
	public function getId(){
		return $this->id;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function getVideoid(){
		return $this->videoid;
	}
}

 ?>