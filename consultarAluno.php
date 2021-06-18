<?php
	require_once("controle/ControleAluno.php");
	if (isset($_POST["matricula"])) {
		$controle = new ControleAluno();	
		$aluno = $controle->selecionarUm(1);
		if (!empty($aluno)) {
			echo "<table>";
				echo "<thead>";
					echo "<tr>";
						echo "<th>Matricula</th>";
						echo "<th>Nome</th>";
						echo "<th>Email</th>";
					echo "</tr>";
				echo "</thead>"; 
				echo "<tbody>";
					echo "<tr>";
						echo "<td>{$aluno->getMatricula()}</td>";	
						echo "<td>{$aluno->getNome()}</td>";
						echo "<td>{$aluno->getEmail()}</td>";
					echo "</tr>";
				echo "</tbody>";
			echo "</table>";
		} else {
			echo "<script>";
			echo "alertify.error('Usuário não cadastrado');";
			echo "</script>";
		}
	} else {
		echo "<script>";
		echo "alertify.error('Não deixe campos em branco!');";
		echo "</script>";
	}	
