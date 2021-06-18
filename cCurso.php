<?php
	require_once("controle/ControleCurso.php");
	if (isset($_POST["nome"]) && isset($_POST["coordenador"])) {
		$curso = new Curso();
		$curso->setNome($_POST["nome"]);
		$curso->setCoordenador($_POST["coordenador"]);
		$controle = new ControleCurso();	
		if ($controle->cadastrar($curso)) {
			echo "<script>";
			echo "alertify.success('Operação bem sucedida');";
			echo "</script>";
            header("Location: http://localhost/av_php/cadastrarCurso.php");
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