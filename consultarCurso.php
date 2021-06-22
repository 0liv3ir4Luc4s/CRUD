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
			echo "<script>";
			echo "curso.error('Curso não cadastrado');";
			echo "</script>";
		}
	} else {
		echo "<script>";
		echo "curso.error('Não deixe campos em branco!');";
		echo "</script>";
	}	
