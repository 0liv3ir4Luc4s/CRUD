<?php
	require_once("controle/ControleTurma.php");
	if (!empty($_POST["serie"])) {
		$turma = new Turma();
		$turma->setSerie(intval($_POST["serie"]));
		$controle = new ControleTurma();	
		if ($controle->cadastrar($turma)) {
			echo "<script>";
			echo "console.log('Operação bem sucedida');";
			echo "</script>";
            header("Location: http://localhost/av_php/cadastrarTurma.php");
		} else {
			echo "<script>";
			echo "console.error('Erro na operação');";
			echo "</script>";
			header("Location: http://localhost/av_php/cadastrarTurma.php");
		}
	} else {
		echo "<script>";
		echo "console.error('Não deixe campos em branco!');";
		echo "</script>";
		header("Location: http://localhost/av_php/cadastrarTurma.php");
	}	
