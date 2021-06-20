<?php
	require_once("controle/Conexao.php");
	require_once("modelo/Relacionamento.php");
	require_once("modelo/Aluno.php");
	require_once("modelo/Curso.php");
	require_once("modelo/Turma.php");
	
	class ControleRelacionamento
	{
		public function cadastrar($relacionamento)
		{
			try {
				$con = new Conexao("controle/configs.ini");	
				$comando = $con->getPDO()->prepare("INSERT INTO relacionamento(aluno, turma, curso) VALUES (:a, :t, :c);");
				$aluno = $relacionamento->getAluno()->getMatricula();
				$comando->bindParam("a", $aluno);
				$turma = $relacionamento->getTurma()->getId();
				$comando->bindParam("t", $turma);
				$curso = $relacionamento->getCurso()->getId();
				$comando->bindParam("c", $curso);
				$retorno = false;
				if ($comando->execute())
					$retorno = true;
			} catch (PDOException $PDOex) {
				$erro = "";
			} catch (Exception $ex) {
				$erro = "";
			} finally {
				echo "<script>";
				echo "</script>";
				$con->fecharConexao();
				return $retorno;
			}
		}

		public function editar($relacionamento, $id)
		{
			try { 
				$con = new Conexao("controle/configs.ini");
				$comando = $con->getPDO()->prepare("UPDATE relacionamento SET aluno=:a, turma=:t, curso=:c WHERE id=:i;");
				$aluno = $relacionamento->getAluno()->getMatricula();
				$comando->bindParam("a", $aluno);
				$turma = $relacionamento->getTurma()->getId();
				$comando->bindParam("t", $turma);
				$curso = $relacionamento->getCurso()->getId();
				$comando->bindParam("c", $curso);
				$comando->bindParam("i", $id);
				$retorno = false;
				if ($comando->execute())
					$retorno = true;
			} catch (PDOException $PDOex) {
				$erro = "";
			} catch (Exception $ex) {
				$erro = "";
			} finally {
				echo "<script>";
				echo "</script>";
				$con->fecharConexao();
				return $retorno;
			}
		}

	}

