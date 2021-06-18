<?php
	require_once("controle/Conexao.php");
	require_once("modelo/Aluno.php");
	
	class ControleCurso
	{
		public function cadastrar($curso)
		{
			try {
				$con = new Conexao("controle/configs.ini");	
				$comando = $con->getPDO()->prepare("INSERT INTO curso(nome, coordenador) VALUES (:n, :c);");
				$nome = $curso->getNome();
				$coordenador = $curso->getCoordenador();
				$comando->bindParam("n", $nome);
				$comando->bindParam("c", $coordenador);
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

		public function selecionarUm($matricula)
		{
			try {
				$con = new Conexao("controle/configs.ini");
				$comando = $con->getPDO()->prepare("SELECT * FROM aluno WHERE matricula={$matricula};");
				$retorno = null;
				if ($comando->execute()) {
					$aluno = $comando->fetchAll(PDO::FETCH_CLASS, "Aluno");
					$retorno = new Aluno();
					$retorno->setMatricula($aluno[0]->getMatricula());
					$retorno->setNome($aluno[0]->getNome());
					$retorno->setEmail($aluno[0]->getEmail());
				}
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

		public function selecionarTodos()
		{
			try {
				$con = new Conexao("controle/configs.ini");
				$comando = $con->getPDO()->prepare("SELECT * FROM aluno;");
				$retorno = null;
				if ($comando->execute()) {
					$retorno = $comando->fetchAll(PDO::FETCH_CLASS, "Aluno");
				}
			} catch (PDOException $PDOEx) {
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

