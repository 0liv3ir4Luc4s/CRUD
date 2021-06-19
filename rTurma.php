<?php
	require_once("controle/ControleTurma.php");
	if (!empty($_POST["id"]) || !empty($_GET["id"])) {
		$controle = new ControleTurma();	
		if ($controle->remover(intval($_POST["id"]))) {
			echo "<script>";
			echo "alertify.success('Operação bem sucedida');";
			echo "</script>";
			!empty($_GET["id"]) ?: header("Location: http://localhost/av_php/removerTurma.php");
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
