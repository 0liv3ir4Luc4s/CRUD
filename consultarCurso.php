<?php
	require_once("controle/ControleCurso.php");
	if (!empty($_GET["id"])) {
		$controle = new ControleCurso();	
		$curso = $controle->selecionarUm(intval($_GET["id"]));
		if (!empty($curso)) {
			echo "<tr>";
				echo "<td id='id_curso'>{$curso->getId()}</td>";	
				echo "<td id='nome'>{$curso->getNome()}</td>";
				echo "<td id='coordenador'>{$curso->getCoordenador()}</td>";
			echo "</tr>";
		} else {
			echo "<tr>";
			echo "<td>Curso não cadastrado</td>";
			echo "</tr>";
		}
	} else {
		echo "<tr>";
		echo "<td>Não deixe campos em branco!</td>";
		echo "</tr>";
	}	
