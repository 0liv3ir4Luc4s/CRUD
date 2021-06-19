<?php
	require_once("controle/ControleTurma.php");
	if (!empty($_POST["serie"])) {
		$turma = new Turma();
		$turma->setSerie(intval($_POST["nome"]));
		$controle = new ControleTurma();	
		if ($controle->cadastrar($turma)) {
			echo "<script>";
			echo "alertify.success('Operação bem sucedida');";
			echo "</script>";
            header("Location: http://localhost/av_php/cadastrarTurma.php");
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
