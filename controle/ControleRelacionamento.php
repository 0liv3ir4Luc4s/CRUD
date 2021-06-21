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
				$aluno = $relacionamento->getAluno();
				$comando->bindParam("a", $aluno);
				$turma = $relacionamento->getTurma();
				$comando->bindParam("t", $turma);
				$curso = $relacionamento->getCurso();
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
				$aluno = $relacionamento->getAluno();
				$comando->bindParam("a", $aluno);
				$turma = $relacionamento->getTurma();
				$comando->bindParam("t", $turma);
				$curso = $relacionamento->getCurso();
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

		public function remover($id)
		{
			try {
				$con = new Conexao("controle/configs.ini");
				$retorno = false;
				if ($con->getPDO()->exec("DELETE FROM relacionamento WHERE id={$id};") > 0)
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
				$comando = $con->getPDO()->prepare("SELECT relacionamento.id, aluno.matricula, aluno.nome AS 'nome_aluno', aluno.email, curso.nome AS 'nome_curso', curso.coordenador, turma.serie FROM relacionamento INNER JOIN aluno ON relacionamento.aluno = aluno.matricula INNER JOIN curso ON relacionamento.curso = curso.id INNER JOIN turma ON relacionamento.turma = turma.id WHERE relacionamento.id={$id};");
				$retorno = null;
				if ($comando->execute()) {
					$rel = $comando->fetchAll(PDO::FETCH_ASSOC);
					$retorno = new Relacionamento();
					$retorno->setId($rel[0]["id"]);
					$retorno->setTurma($rel[0]["serie"]);

					$a = new Aluno();
					$a->setMatricula($rel[0]["matricula"]);
					$a->setNome($rel[0]["nome_aluno"]);
					$a->setEmail($rel[0]["email"]);

					$c = new Curso();
					$c->setNome($rel[0]["nome_curso"]);
					$c->setCoordenador($rel[0]["coordenador"]);

					$retorno->setAluno($a);
					$retorno->setCurso($c);
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
				$comando = $con->getPDO()->prepare("SELECT relacionamento.id, aluno.matricula, aluno.nome AS 'nome_aluno', aluno.email, curso.nome AS 'nome_curso', curso.coordenador, turma.serie FROM relacionamento INNER JOIN aluno ON relacionamento.aluno = aluno.matricula INNER JOIN curso ON relacionamento.curso = curso.id INNER JOIN turma ON relacionamento.turma = turma.id;");
				$retorno = null;
				if ($comando->execute()) {
					$retorno = array();
					$rels = $comando->fetchAll(PDO::FETCH_ASSOC);
					foreach($rels as $rel) {
						$relacionamento = new Relacionamento();
						$relacionamento->setId($rel["id"]);
						$relacionamento->setTurma($rel["serie"]);

						$a = new Aluno();
						$a->setMatricula($rel["matricula"]);
						$a->setNome($rel["nome_aluno"]);
						$a->setEmail($rel["email"]);

						$c = new Curso();
						$c->setNome($rel["nome_curso"]);
						$c->setCoordenador($rel["coordenador"]);

						$relacionamento->setAluno($a);
						$relacionamento->setCurso($c);

						$retorno[] = $relacionamento;
					}
				}
			} catch (PDOException $PDOEx) {
				$erro = "Erro no banco de dados ao listar";
			} catch (Exception $ex) {
				$erro = "Erro geral ao listar";
			} finally {
				echo "<script>";
				echo "alertify.error({$erro});";
				echo "</script>";
				$con->fecharConexao();
				return $retorno;
			}
		}

	}

