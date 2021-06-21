<?php
	require_once("controle/ControleRelacionamento.php");
	if (!empty($_POST["aluno"]) && !empty($_POST["turma"]) && !empty($_POST["curso"])) {
		$rel = new Relacionamento();
		$rel->setAluno(intval($_POST["aluno"]));
		$rel->setTurma(intval($_POST["turma"]));
		$rel->setCurso(intval($_POST["email"]));
		$controle = new ControleRelacionamento();	
		if ($controle->cadastrar($rel)) {
			echo "<script>";
			echo "alertify.success('Operação bem sucedida');";
			echo "</script>";
            header("Location: http://localhost/av_php/cadastrarRelacionamento.php");
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