<?php
	require_once("controle/Conexao.php");
	require_once("modelo/Curso.php");
	
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
		
		public function editar($curso)
		{
			try {
				$con = new Conexao("controle/configs.ini");
				$comando = $con->getPDO()->prepare("UPDATE curso SET nome=:n, coordenador=:c WHERE id=:i;");
				$nome = $curso->getNome();
				$coordenador = $curso->getCoordenador();
				$id = $curso->getId();
				$comando->bindParam("n", $nome);
				$comando->bindParam("c", $coordenador);
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

		public function remover($id)
		{
			try {
				$con = new Conexao("controle/configs.ini");
				$retorno = false;
				if ($con->getPDO()->exec("DELETE FROM curso WHERE id={$id};") > 0)
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

		public function selecionarUm($id)
		{
			try {
				$con = new Conexao("controle/configs.ini");
				$comando = $con->getPDO()->prepare("SELECT * FROM curso WHERE id={$id};");
				$retorno = null;
				if ($comando->execute()) {
					$curso = $comando->fetchAll(PDO::FETCH_CLASS, "Curso");
					$retorno = new Curso();
					$retorno->setId($curso[0]->getId());
					$retorno->setNome($curso[0]->getNome());
					$retorno->setCoordenador($curso[0]->getCoordenador());
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
				$comando = $con->getPDO()->prepare("SELECT * FROM curso;");
				$retorno = null;
				if ($comando->execute()) {
					$retorno = $comando->fetchAll(PDO::FETCH_CLASS, "Curso");
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

