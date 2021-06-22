<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<link rel="stylesheet" href="css/lib/alertify.min.css">
		<link rel="stylesheet" href="css/lib/default.min.css">
		<title>Remover Turma</title>
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
										<a href="#" class="nav-link" role="button" id="dropAluno" data-bs-toggle="dropdown" aria-expanded="false">Aluno</a>
										<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropAluno">
											<li><a href="index.php" class="dropdown-item">Lista</a></li>
											<li><a href="cadastrarAluno.php" class="dropdown-item">Cadastrar</a></li>
											<li><a href="editarAluno.php" class="dropdown-item">Editar</a></li>
											<li><a href="removerAluno.php" class="dropdown-item">Remover</a></li>
										</ul>
									</li>
                                    <li class="nav-item dropdown">
										<a href="#" class="nav-link" role="button" id="dropCurso" data-bs-toggle="dropdown" aria-expanded="false">Curso</a>
										<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropCurso">
											<li><a href="listarCurso.php" class="dropdown-item">Lista</a></li>
											<li><a href="cadastrarCurso.php" class="dropdown-item">Cadastrar</a></li>
											<li><a href="editarCurso.php" class="dropdown-item">Editar</a></li>
											<li><a href="removerCurso.php" class="dropdown-item">Remover</a></li>
										</ul>
									</li>
                                    <li class="nav-item dropdown">
										<a href="#" class="nav-link active" aria-current="page" role="button" id="dropTurma" data-bs-toggle="dropdown" aria-expanded="false">Turma</a>
										<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropTurma">
											<li><a href="listarTurma.php" class="dropdown-item">Lista</a></li>
											<li><a href="cadastrarTurma.php" class="dropdown-item">Cadastrar</a></li>
											<li><a href="editarTurma.php" class="dropdown-item active" aria-current="page">Editar</a></li>
											<li><a href="removerTurma.php" class="dropdown-item">Remover</a></li>
										</ul>
									</li>
									<li class="nav-item dropdown">
										<a href="#" class="nav-link" role="button" id="dropRelacionamento" data-bs-toggle="dropdown" aria-expanded="false">Relacionamento</a>
										<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropRelacionamento">
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
                <a href="listarTurma.php" class="btn btn-secondary my-3"><i class="bi bi-arrow-return-left"></i> Voltar</a>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <h2>Editar Turma</h2>
                        <form class="needs-validation" method="POST" action="eTurma.php" novalidate>
                            <div class="pb-3 mb-2 border-bottom">
                                <label for="consulta_id" class="form-label">Pesquisar turma por ID:</label>
                                <div class="input-group">
                                    <input id="consulta_id" class="form-control" type="text" <?php if(isset($_GET['id'])) { echo "value={$_GET['id']}"; }?>>                  
                                    <button id="btnConsultar" data-ref="consultarTurma.php" class="btn btn-warning" type="button"><i class="bi bi-search"></i></button>
                                </div>
                                <div id="tabela" class="d-none">
                                    <div class="table-responsive-sm mt-2">
                                        <table class="table table-hover">
                                            <thead>
							                    <tr class="table-dark">
								                    <th>ID</th>
								                    <th>Serie</th>
							                    </tr>
						                    </thead>
                                            <tbody id="consulta">
                                            </tbody>
                                        </table> 
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="id" class="form-label">ID da Turma:</label>
                                <input id="id" class="form-control" type="text" name="id" required>
                            </div>
                            <div>
                                <label for="serie" class="form-label">Serie:</label>
                                <input id="serie" class="form-control" type="text" name="serie" required>
                            </div>
                            <div class="mt-3">
                                <input type="submit" class="btn btn-warning" value="Editar">
                            </div>
                        </form>
                    </div>
                </div>
            </main>
    <script src="js/Ajax.js"></script>
	<script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
