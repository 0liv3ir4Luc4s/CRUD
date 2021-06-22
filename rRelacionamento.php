<?php
	require_once("controle/ControleRelacionamento.php");
	if (!empty($_POST["id"]) || !empty($_GET["id"])) {
		$controle = new ControleRelacionamento();	
		$id = $_POST["id"] ?? $_GET["id"];
		if ($controle->remover(intval($id))) {
			if (isset($_GET['id'])) {
				echo "alertify.success('Operação bem sucedida');";
			} else {
				echo "<script>console.log('Operação bem sucedida');</script>";
				header("Location: http://localhost/av_php/removerRelacionamento.php");
			}
		} else {
			if (isset($_GET['id'])) {
				echo "alertify.error('Erro na operação');";
			} else {
				echo "<script>";
				echo "console.error('Erro na operação');";
				echo "</script>";
			}
		}
	} else {
		if (isset($_GET['id'])) {
			echo "console.error('Não deixe campos em branco!');";
		} else {
			echo "<script>";
			echo "console.error('Não deixe campos em branco!');";
			echo "</script>";
		}
		
	}	
