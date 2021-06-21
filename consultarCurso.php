<?php
	require_once("controle/ControleCurso.php");
	if (!empty($_GET["id"])) {
		$controle = new ControleCurso();	
		$curso = $controle->selecionarUm(intval($_POST["id"]));
		if (!empty($curso)) {
			echo "<table>";
				echo "<thead>";
					echo "<tr>";
						echo "<th>Id</th>";
						echo "<th>Nome</th>";
						echo "<th>Coordenador</th>";
					echo "</tr>";
				echo "</thead>"; 
				echo "<tbody>";
					echo "<tr>";
						echo "<td>{$curso->getId()}</td>";	
						echo "<td>{$curso->getNome()}</td>";
						echo "<td>{$curso->getCoordenador()}</td>";
					echo "</tr>";
				echo "</tbody>";
			echo "</table>";
		} else {
			echo "<script>";
			echo "alertify.error('Curso não cadastrado');";
			echo "</script>";
		}
	} else {
		echo "<script>";
		echo "alertify.error('Não deixe campos em branco!');";
		echo "</script>";
	}	
