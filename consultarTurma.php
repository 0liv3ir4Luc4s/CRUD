<?php
	require_once("controle/ControleTurma.php");
	if (!empty($_POST["id"])) {
		$controle = new ControleTurma();	
		$turma = $controle->selecionarUm(intval($_POST["id"]));
		if (!empty($turma)) {
			echo "<table>";
				echo "<thead>";
					echo "<tr>";
						echo "<th>ID</th>";
						echo "<th>Serie</th>";
					echo "</tr>";
				echo "</thead>"; 
				echo "<tbody>";
					echo "<tr>";
						echo "<td>{$turma->getId()}</td>";	
						echo "<td>{$turma->getSerie()}</td>";
					echo "</tr>";
				echo "</tbody>";
			echo "</table>";
		} else {
			echo "<script>";
			echo "alertify.error('Turma não cadastrada');";
			echo "</script>";
		}
	} else {
		echo "<script>";
		echo "alertify.error('Não deixe campos em branco!');";
		echo "</script>";
	}	
