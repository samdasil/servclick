<?php

	class AreaAtuacao{
		//Atributos
		private $idarea;
 		private $descricao;
 		private $categoria;
 				
		//Métodos Getters e Setters
		public function getIdarea(){
			return $this->idarea;
		}
		public function getDescricao(){
			return $this->descricao;
		}
		public function getCategoria(){
			return $this->categoria;
		}
		
		public function setIdarea($idarea){
			$this->idarea=$idarea;
		}
		public function setDescricao($descricao){
			$this->descricao=$descricao;
		}
		public function setCategoria($categoria){
			$this->categoria=$categoria;
		}
		
	}
	
?>