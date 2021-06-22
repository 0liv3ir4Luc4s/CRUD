<?php
	require_once("controle/ControleTurma.php");
	if (!empty($_POST["id"]) || !empty($_GET["id"])) {
		$controle = new ControleTurma();
		$id = $_POST["id"] ?? $_GET["id"];
		if ($controle->remover(intval($id))) {
			if (isset($_GET['id'])) {
				echo "alertify.success('Operação bem sucedida');";
			} else {
				echo "<script>";
				echo "console.log('Operação bem sucedida');";
				echo "</script>";
				header("Location: http://localhost/av_php/removerTurma.php");
			}
		} else {
			if (isset($_GET['id'])) {
				echo "alertify.error('Erro na operação');";
			} else {
				echo "<script>";
				echo "console.error('Erro na operação');";
				echo "</script>";
				header("Location: http://localhost/av_php/removerTurma.php");
			}
		}
	} else {
		if (isset($_GET['id'])) {
			echo "alertify.error('Não deixe campos em branco!');";
		} else {
			echo "<script>";
			echo "console.error('Não deixe campos em branco!');";
			echo "</script>";
			header("Location: http://localhost/av_php/removerTurma.php");
		}
	}	