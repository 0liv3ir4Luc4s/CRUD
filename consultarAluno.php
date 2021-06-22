<?php
	require_once("controle/ControleAluno.php");
	if (!empty($_GET["id"])) {
		$controle = new ControleAluno();	
		$aluno = $controle->selecionarUm($_GET['id']);
		if (!empty($aluno)) {
			echo "<tr>";
				echo "<td id='matricula'>{$aluno->getMatricula()}</td>";	
				echo "<td id='nome'>{$aluno->getNome()}</td>";
				echo "<td id='email'>{$aluno->getEmail()}</td>";
			echo "</tr>";
		} else {
			echo "<script>";
			echo "console.error('Usuário não cadastrado');";
			echo "</script>";
		}
	} else {
		echo "<script>";
		echo "console.error('Não deixe campos em branco!');";
		echo "</script>";
	}	
