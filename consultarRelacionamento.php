<?php
	require_once("controle/ControleRelacionamento.php");
	if (!empty($_GET["id"])) {
		$controle = new ControleRelacionamento();	
		$relacionamento = $controle->selecionarUm(intval($_GET["id"]));
		if (!empty($relacionamento)) {
			echo "<tr>";
				echo "<td id='id_rel'>{$relacionamento->getId()}</td>";	
				echo "<td id='matricula_al'>{$relacionamento->getAluno()->getMatricula()}</td>";
				echo "<td>{$relacionamento->getAluno()->getNome()}</td>";
				echo "<td>{$relacionamento->getAluno()->getEmail()}</td>";
				echo "<td id='id_curso' class='d-none'>{$relacionamento->getCurso()->getId()}</td>";
				echo "<td>{$relacionamento->getCurso()->getNome()}</td>";
				echo "<td>{$relacionamento->getCurso()->getCoordenador()}</td>";
				echo "<td id='id_turma' class='d-none'>{$relacionamento->getTurma()->getId()}</td>";
				echo "<td>{$relacionamento->getTurma()->getSerie()}</td>";	
			echo "</tr>";
		} else {
			echo "<tr>";
			echo "<td>Relacionamento não cadastrado</td>";
			echo "</tr>";
		}
	} else {
		echo "<tr>";
		echo "<td>Não deixe campos em branco!</td>";
		echo "</tr>";
	}
