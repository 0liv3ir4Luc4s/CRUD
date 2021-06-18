<?php
	class Curso
	{
		private $id;
		private $nome;
		private $coordenador;

		public function getId()
		{
			return $this->id;
		}

		public function setId($i)
		{
			$this->id = $i;
		}

		public function getNome()
		{
			return $this->nome;
		}

		public function setNome($n)
		{
			$this->nome = $n;
		}

		public function getCoordenador()
		{
			return $this->coordenador;
		}

		public function setCoordenador($c)
		{
			$this->coordenador = $c;
		}
	}
