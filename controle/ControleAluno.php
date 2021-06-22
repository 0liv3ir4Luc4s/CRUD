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
				if ($comando->execute()) {
					$retorno = true;
				}
			} catch (PDOException $PDOex) {
				echo "<script>";
				echo "console.error('Erro no banco de dados ao cadastrar aluno');";
				echo "</script>";
			} catch (Exception $ex) {
				echo "<script>";
				echo "console.error('Erro geral ao cadastrar relacionamento');";
				echo "</script>";
			} finally {
				$con->fecharConexao();
				return $retorno;
			}
		}
		
		public function editar($aluno, $matricula)
		{
			try {
				$con = new Conexao("controle/configs.ini");
				$comando = $con->getPDO()->prepare("UPDATE aluno SET nome=:n, email=:e WHERE matricula=:m");
				$nome = $aluno->getNome();
				$email = $aluno->getEmail();
				$comando->bindParam("n", $nome);
				$comando->bindParam("e", $email);
				$comando->bindParam("m", $matricula);
				$retorno = false;
				if ($comando->execute()) {
					$retorno = true;
				}
			} catch (PDOException $PDOex) {
				echo "<script>";
				echo "console.error('Erro no banco de dados ao editar relacionamento');";
				echo "</script>";
			} catch (Exception $ex) {
				echo "<script>";
				echo "console.error('Erro geral ao editar relacionamento');";
				echo "</script>";
			} finally {
				$con->fecharConexao();
				return $retorno;
			}
		}

		public function remover($matricula)
		{
			try {
				$con = new Conexao("controle/configs.ini");
				$retorno = false;
				if ($con->getPDO()->exec("DELETE FROM aluno WHERE matricula={$matricula};") > 0) {
					$retorno = true;
				}
			} catch (PDOException $PDOex) {
				echo "<script>";
				echo "console.error('Erro no banco de dados ao remover relacionamento');";
				echo "</script>";
			} catch (Exception $ex) {
				echo "<script>";
				echo "console.error('Erro geral ao remover relacionamento');";
				echo "</script>";
			} finally {
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
				echo "<script>";
				echo "console.error('Erro geral ao selecionar relacionamento');";
				echo "</script>";
			} catch (Exception $ex) {
				echo "<script>";
				echo "console.error('Erro geral ao selecionar relacionamento');";
				echo "</script>";
			} finally {
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
				echo "<script>";
				echo "console.error('Erro no banco de dados ao listar relacionamento');";
				echo "</script>";
			} catch (Exception $ex) {
				echo "<script>";
				echo "console.error('Erro geral ao listar relacionamento');";
				echo "</script>";
			} finally {
				$con->fecharConexao();
				return $retorno;
			}
		}
	}

