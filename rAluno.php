<?php
	require_once("controle/ControleAluno.php");
	if (!empty($_POST["matricula"]) || !empty($_GET["matricula"])) {
		$controle = new ControleAluno();	
		$matricula = $_POST['matricula'] ?? $_GET['matricula'];
		if ($controle->remover(intval($matricula))) {
			if (isset($_GET['matricula'])) {
				echo "alertify.success('Operação bem sucedida');";
			} else {
				echo "<script>";
				echo "console.log('Operação bem sucedida');";
				echo "</script>";
				header("Location: http://localhost/av_php/removerAluno.php");
			}
		} else {
			if (isset($_GET['matricula'])) {
				echo "alertify.error('Erro na operação');";
			} else {
				echo "<script>";
				echo "console.error('Erro na operação');";
				echo "</script>";
				header("Location: http://localhost/av_php/removerAluno.php");
			}
		}
	} else {
		if (isset($_GET['matricula'])) {
			echo "alertify.error('Não deixe campos em branco!');";
		} else {
			echo "<script>";
			echo "console.error('Não deixe campos em branco!');";
			echo "</script>";
			header("Location: http://localhost/av_php/removerAluno.php");
		}
	}	
