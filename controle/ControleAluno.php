<?php
	require_once("controle/Conexao.php");
	require_once("modelo/Aluno.php");
	
	class ControleAluno
	{
		public function cadastrar($aluno)
		{
			try {
				$con = new Conexao("controle/configs.ini");	
				$comando = $con->getPDO()->prepare("INSERT INTO aluno VALUES (:m, :n, :e);");
				$matricula = $aluno->getMatricula();
				$nome = $aluno->getNome();
				$email = $aluno->getEmail();
				$comando->bindParam("m", $matricula);
				$comando->bindParam("n", $nome);
				$comando->bindParam("e", $email);
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
		
		public function editar($aluno)
		{
			try {
				$con = new Conexao("controle/configs.ini");
				$comando = $con->getPDO()->prepare("UPDATE aluno SET nome=:n, email=:e WHERE matricula=:m");
				$nome = $aluno->getNome();
				$email = $aluno->getEmail();
				$matricula = $aluno->getMatricula();
				$comando->bindParam("n", $nome);
				$comando->bindParam("e", $email);
				$comando->bindParam("m", $matricula);
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

		public function remover($matricula)
		{
			try {
				$con = new Conexao("controle/configs.ini");
				$retorno = false;
				if ($con->getPDO()->exec("DELETE FROM aluno WHERE matricula={$matricula};") > 0)
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

