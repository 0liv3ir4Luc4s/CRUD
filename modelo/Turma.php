<?php
	class Turma
	{
		private $id;
		private $serie;

		public function getId()
		{
			return $this->id;
		}

		public function setId($i)
		{
			$this->id = $i;
		}

		public function getSerie()
		{
			return $this->serie;
		}

		public function setSerie($s)
		{
			$this->serie = $s;
		}
	}
