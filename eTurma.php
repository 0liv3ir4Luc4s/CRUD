<?php
	require_once("controle/ControleTurma.php");
	if (!empty($_POST["id"]) && !empty($_POST["serie"])) {
		$turma = new Turma();
		$turma->setId(intval($_POST["id"]));
		$turma->setSerie($_POST["serie"]);
		$controle = new ControleTurma();	
		if ($controle->editar($turma)) {
			echo "<script>";
			echo "alertify.success('Operação bem sucedida');";
			echo "</script>";
            header("Location: http://localhost/av_php/editarTurma.php");
		} else {
			echo "<script>";
			echo "alertify.error('Erro na operação');";
			echo "</script>";
		}
	} else {
		echo "<script>";
		echo "alertify.error('Não deixe campos em branco!');";
		echo "</script>";
	}	
