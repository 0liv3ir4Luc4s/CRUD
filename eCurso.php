<?php
	require_once("controle/ControleCurso.php");
if (!empty($_POST["id"]) && !empty($_POST["nome"]) && !empty($_POST["coordenador"])) {
		$curso = new Curso();
		$curso->setId(intval($_POST["id"]));
		$curso->setNome($_POST["nome"]);
		$curso->setCoordenador($_POST["coordenador"]);
		$controle = new ControleCurso();	
		if ($controle->editar($curso)) {
			echo "<script>";
			echo "alertify.success('Operação bem sucedida');";
			echo "</script>";
            header("Location: http://localhost/av_php/editarCurso.php");
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
