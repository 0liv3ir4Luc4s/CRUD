<?php
	require_once("controle/ControleRelacionamento.php");
	if (!empty($_POST["id"])) {
		$controle = new ControleRelacionamento();	
		$relacionamento = $controle->selecionarUm(intval($_POST["id"]));
		if (!empty($relacionamento)) {
			echo "<table>";
				echo "<thead>";
					echo "<tr>";
						echo "<th>ID</th>";
						echo "<th>Matricula</th>";
						echo "<th>Aluno</th>";
						echo "<th>Email</th>";
						echo "<th>Curso</th>";
						echo "<th>Coordenador</th>";
						echo "<th>Turma</th>";
					echo "</tr>";
				echo "</thead>"; 
				echo "<tbody>";
					echo "<tr>";
						echo "<td>{$relacionamento->getId()}</td>";	
						echo "<td>{$relacionamento->getAluno()->getMatricula()}</td>";
						echo "<td>{$relacionamento->getAluno()->getNome()}</td>";
						echo "<td>{$relacionamento->getAluno()->getEmail()}</td>";
						echo "<td>{$relacionamento->getCurso()->getNome()}</td>";
						echo "<td>{$relacionamento->getCurso()->getCoordenador()}</td>";
						echo "<td>{$relacionamento->getTurma()}</td>";	
					echo "</tr>";
				echo "</tbody>";
			echo "</table>";
		} else {
			echo "<script>";
			echo "alertify.error('Relacionamento não cadastrado');";
			echo "</script>";
		}
	} else {
		echo "<script>";
		echo "alertify.error('Não deixe campos em branco!');";
		echo "</script>";
	}
