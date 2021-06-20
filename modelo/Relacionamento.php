<?php
	class Relacionamento
	{
		private $id;
		private $aluno;
		private $curso;
		private $turma;

		public function getId()
		{
			return $this->id;
		}

		public function setId($i)
		{
			$this->id = $i;
		}

		public function getAluno()
		{
			return $this->aluno;
		}

		public function setAluno($a)
		{
			$this->aluno = $a;
		}

		public function getCurso()
		{
			return $this->curso;
		}

		public function setCurso($c)
		{
			$this->curso = $c;
		}

		public function getTurma()
		{
			return $this->turma;
		}

		public function setTurma($t) 
		{
			$this->turma = $t;
		}
	}
