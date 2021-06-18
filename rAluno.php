<?php
	require_once("controle/ControleAluno.php");
	if (!empty($_POST["matricula"])) {
		$controle = new ControleAluno();	
		if ($controle->remover(intval($_POST["matricula"]))) {
			echo "<script>";
			echo "alertify.success('Operação bem sucedida');";
			echo "</script>";
            header("Location: http://localhost/av_php/removerAluno.php");
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
