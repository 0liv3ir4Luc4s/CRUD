<?php
	require_once("controle/ControleTurma.php");
	if (!empty($_POST["id"]) && !empty($_POST["serie"])) {
		$turma = new Turma();
		$turma->setSerie($_POST["serie"]);
		$controle = new ControleTurma();	
		if ($controle->editar($turma, intval($_POST["id"]))) {
			echo "<script>";
			echo "console.log('Operação bem sucedida');";
			echo "</script>";
            header("Location: http://localhost/av_php/editarTurma.php");
		} else {
			echo "<script>";
			echo "console.error('Erro na operação');";
			echo "</script>";
			header("Location: http://localhost/av_php/editarTurma.php");
		}
	} else {
		echo "<script>";
		echo "console.error('Não deixe campos em branco!');";
		echo "</script>";
		header("Location: http://localhost/av_php/editarTurma.php");
	}	
