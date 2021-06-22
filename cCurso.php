<?php
	require_once("controle/ControleCurso.php");
	if (!empty($_POST["nome"]) && !empty($_POST["coordenador"])) {
		$curso = new Curso();
		$curso->setNome($_POST["nome"]);
		$curso->setCoordenador($_POST["coordenador"]);
		$controle = new ControleCurso();	
		if ($controle->cadastrar($curso)) {
			echo "<script>";
			echo "console.success('Operação bem sucedida');";
			echo "</script>";
            header("Location: http://localhost/av_php/cadastrarCurso.php");
		} else {
			echo "<script>";
			echo "console.error('Erro na operação');";
			echo "</script>";
		}
	} else {
		echo "<script>";
		echo "console.error('Não deixe campos em branco!');";
		echo "</script>";
	}	
