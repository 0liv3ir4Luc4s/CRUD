<?php
	require_once("controle/Conexao.php");
	require_once("modelo/Turma.php");
	
	class ControleTurma
	{
		public function cadastrar($turma)
		{
			try {
				$con = new Conexao("controle/configs.ini");	
				$comando = $con->getPDO()->prepare("INSERT INTO turma(serie) VALUES (:s);");
				$serie = $turma->getSerie();
				$comando->bindParam("s", $serie);
				$retorno = false;
				if ($comando->execute()) {
					$retorno = true;
				}
			} catch (PDOException $PDOex) {
				echo "<script>";
				echo "console.error('Erro no banco de dados ao cadastrar turma');";
				echo "</script>";		
			} catch (Exception $ex) {
				echo "<script>";
				echo "console.error('Erro geral ao cadastrar turma');";
				echo "</script>";
			} finally {
				$con->fecharConexao();
				return $retorno;
			}
		}
		
		public function editar($turma, $id)
		{
			try { 
				$con = new Conexao("controle/configs.ini");
				$comando = $con->getPDO()->prepare("UPDATE turma SET serie=:s WHERE id=:i;");
				$serie = $turma->getSerie();
				$comando->bindParam("s", $serie);
				$comando->bindParam("i", $id);
				$retorno = false;
				if ($comando->execute()) {
					$retorno = true;
				}
			} catch (PDOException $PDOex) {
				echo "<script>";
				echo "console.error('Erro no banco de dados ao editar turma');";
				echo "</script>";
			} catch (Exception $ex) {
				echo "<script>";
				echo "console.error('Erro geral ao editar turma');";
				echo "</script>";
			} finally {
				$con->fecharConexao();
				return $retorno;
			}
		}

		public function remover($id)
		{
			try {
				$con = new Conexao("controle/configs.ini");
				$retorno = false;
				if ($con->getPDO()->exec("DELETE FROM turma WHERE id={$id};") > 0) {
					$retorno = true;
				}
			} catch (PDOException $PDOex) {
				echo "<script>";
				echo "console.error('Erro no banco de dados ao remover turma');";
				echo "</script>";
			} catch (Exception $ex) {
				echo "<script>";
				echo "console.error('Erro geral ao remover turma');";
				echo "</script>";
			} finally {
				$con->fecharConexao();
				return $retorno;
			}
		}

		public function selecionarUm($id)
		{
			try {
				$con = new Conexao("controle/configs.ini");
				$comando = $con->getPDO()->prepare("SELECT * FROM turma WHERE id={$id};");
				$retorno = null;
				if ($comando->execute()) {
					$turma = $comando->fetchAll(PDO::FETCH_CLASS, "Turma");
					$retorno = new Turma();
					$retorno->setId($turma[0]->getId());
					$retorno->setSerie($turma[0]->getSerie());
				}
			} catch (PDOException $PDOex) {
				echo "<script>";
				echo "console.error('Erro no banco de dados ao selecionar turma');";
				echo "</script>";
			} catch (Exception $ex) {
				echo "<script>";
				echo "console.error('Erro geral ao selecionar turma');";
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
				$comando = $con->getPDO()->prepare("SELECT * FROM turma;");
				$retorno = null;
				if ($comando->execute()) {
					$retorno = $comando->fetchAll(PDO::FETCH_CLASS, "Turma");
				}
			} catch (PDOException $PDOex) {
				echo "<script>";
				echo "console.error('Erro geral ao listar turma');";
				echo "</script>";
			} catch (Exception $ex) {
				echo "<script>";
				echo "console.error('Erro geral ao listar turma');";
				echo "</script>";
			} finally {
				$con->fecharConexao();
				return $retorno;
			}
		}
	}

