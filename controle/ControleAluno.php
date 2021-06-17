<?php
	require_once("controle/Conexao.php");
	require_once("modelo/Aluno.php");
	
	public class ControleAluno
	{
		public function inserir($aluno)
		{
			try {
				$con = new Conexao("controle/configs.ini");	
				$comando = $con->getPDO()->prepare("INSERT INTO aluno VALUES (:m, :n, :e);");
				$matricula = $aluno->getMatricula();
				$comando->bindParam($matricula);
				$nome = $aluno->getNome();
				$comando->bindParam($nome);
				$email = $aluno->getEmail();
				$comando->bindParam($email);
				$retorno = false;
				if ($comando->execute)
					$retorno = true;
			} catch (PDOException $PDOex) {
				$erro = "";
			} catch (Exception $ex) {
				$erro = "";
			} finally {
				echo "<script>";
				echo "</script>";
				$con->fecharConexao();
			}
		}
	}

