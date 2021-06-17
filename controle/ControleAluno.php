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
				$comando->bindParam("m", $matricula);
				$nome = $aluno->getNome();
				$comando->bindParam("n", $nome);
				$email = $aluno->getEmail();
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
	}

