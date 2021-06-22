<?php
	require_once("controle/ControleTurma.php");
	if (!empty($_GET["id"])) {
		$controle = new ControleTurma();	
		$turma = $controle->selecionarUm(intval($_GET["id"]));
		if (!empty($turma)) {
			echo "<tr>";
				echo "<td id='id_turma'>{$turma->getId()}</td>";	
				echo "<td id='serie'>{$turma->getSerie()}</td>";
			echo "</tr>";
		} else {
			echo "<script>";
			echo "console.error('Turma não cadastrada');";
			echo "</script>";
		}
	} else {
		echo "<script>";
		echo "console.error('Não deixe campos em branco!');";
		echo "</script>";
	}	
