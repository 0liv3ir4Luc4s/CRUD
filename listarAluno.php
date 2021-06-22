<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<link rel="stylesheet" href="css/lib/alertify.min.css">
		<link rel="stylesheet" href="css/lib/default.min.css">
		<title>Home Aluno</title>
	</head>
	<body>
		<script src="js/lib/alertify.min.js"></script>
			<header>
				<div class="navbar navbar-expand-sm navbar-dark bg-dark">
					<div class="container-fluid">
						<a class="navbar-brand" href="index.php">Avaliação</a>
						<button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-responsiva" aria-controls="navbar-responsiva" aria-expanded="false" aria-label="navbar-responsiva">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse flex-grow-0" id="navbar-responsiva">	
							<nav>
								<ul class="navbar-nav">
                                    <li class="nav-item dropdown">
										<a href="#" class="nav-link active" aria-current="page" role="button" id="dropAluno" data-bs-toggle="dropdown" aria-expanded="false">Aluno</a>
										<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropAluno">
											<li><a href="index.php" class="dropdown-item active" aria-current="page">Lista</a></li>
											<li><a href="cadastrarAluno.php" class="dropdown-item">Cadastrar</a></li>
											<li><a href="editarAluno.php" class="dropdown-item">Editar</a></li>
											<li><a href="removerAluno.php" class="dropdown-item">Remover</a></li>
										</ul>
									</li>
									<li class="nav-item dropdown">
										<a href="#" class="nav-link" role="button" id="dropAluno" data-bs-toggle="dropdown" aria-expanded="false">Relacionamento</a>
										<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropAluno">
											<li><a href="index.php" class="dropdown-item">Lista</a></li>
											<li><a href="cadastrarRelacionamento.php" class="dropdown-item">Cadastrar</a></li>
											<li><a href="editarRelacionamento.php" class="dropdown-item">Editar</a></li>
											<li><a href="removerRelacionamento.php" class="dropdown-item">Remover</a></li>
										</ul>
									</li>	
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</header>
			<main class="container-fluid">
				<div class="d-flex justify-content-center">
					<div class="d-flex d-sm-none">
						<div class="btn-group my-3" role="group" aria-label="Ações">
							<a href="cadastrarAluno.php" class="btn btn-success btn-lg"><i class="bi bi-plus-lg"></i></a>
							<a href="editarAluno.php" class="btn btn-warning btn-lg"><i class="bi bi-pen"></i></a>
							<a href="removerAluno.php" class="btn btn-danger btn-lg"><i class="bi bi-trash"></i></i></a>
						</div>
					</div>
					<div class="d-none d-sm-block">
						<div class="d-flex gap-3 my-3">
							<a href="cadastrarAluno.php" class="btn btn-success">Cadastrar</a>
							<a href="editarAluno.php" class="btn btn-warning">Editar</a>
							<a href="removerAluno.php" class="btn btn-danger">Remover</a>
						</div>
					</div>
				</div>
				<div class="d-flex flex-wrap d-sm-none">
					<div class="row row-cols-2">
						<?php
							require_once("controle/ControleAluno.php");
							$cont = new ControleAluno();
							$lista = $cont->selecionarTodos();
							for ($i = 0; $i < sizeof($lista); $i++) {
								echo "<div class='col mb-3'>";
								echo "<div class='card'>";
								echo "<div class='card-body'>";
								echo "<h5 class='card-title'>{$lista[$i]->getNome()}</h5>";
								echo "<ul class='list-group list-group-flush'>";
								echo "<li class='list-group-item'><span class='fw-bold'>Matricula: </span>{$lista[$i]->getMatricula()}</li>";
								echo "<li class='list-group-item'><span class='fw-bold'>Email: </span>{$lista[$i]->getEmail()}</li>";
								echo "<div class='d-flex justify-content-around'>";
								echo "<td><a href='editarAluno.php?matricula={$lista[$i]->getMatricula()}' class='btn btn-warning btn-sm'><i class='bi bi-pen'></i></a></td>";
								echo "<td><button data-ref='rAluno.php?matricula={$lista[$i]->getMatricula()}' type='button' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></button></td>";
								echo "</div>";
								echo "</ul>";
								echo "</div>";
								echo "</div>";
								echo "</div>";
							}
						?>	
					</div>
					
				</div>
				<div class="d-none d-sm-block table-responsive-sm">
					<table class="table table-hover">
					<thead>
						<tr class="table-dark">
							<th>Matricula</th>
							<th>Aluno</th>
							<th>Email</th>
							<th>Editar</th>
							<th>Remover</th>
						</tr>
						</thead>
						<tbody>
						<?php
							require_once("controle/ControleAluno.php");
							$cont = new ControleAluno();
							$lista = $cont->selecionarTodos();
							for ($i = 0; $i < sizeof($lista); $i++) {
								echo "<tr>";
								echo "<td>{$lista[$i]->getMatricula()}</td>";
								echo "<td>{$lista[$i]->getNome()}</td>";
								echo "<td>{$lista[$i]->getEmail()}</td>";
								echo "<td><a href='editarAluno.php?matricula={$lista[$i]->getMatricula()}' class='btn btn-warning btn-sm'><i class='bi bi-pen'></i></a></td>";
								echo "<td><button data-ref='rAluno.php?matricula={$lista[$i]->getMatricula()}' type='button' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></button></td>";
								echo "</tr>";
							}
						?>
						</tbody>
				</table>
				</div>
		</main>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
		<script src="js/Ajax.js"></script>
		<script src="js/app.js"></script>
	</body>
</html>
