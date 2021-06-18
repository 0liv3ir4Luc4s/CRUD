<?php
	require_once("controle/ControleAluno.php");
	if (!empty($_POST["matricula"]) && !empty($_POST["nome"]) && !empty($_POST["email"])) {
		$aluno = new Aluno();
		$aluno->setMatricula(intval($_POST["matricula"]));
		$aluno->setNome($_POST["nome"]);
		$aluno->setEmail($_POST["email"]);
		$controle = new ControleAluno();	
		if ($controle->cadastrar($aluno)) {
			echo "<script>";
			echo "alertify.success('Operação bem sucedida');";
			echo "</script>";
            header("Location: http://localhost/av_php/cadastrarAluno.php");
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
