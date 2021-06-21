<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<title>Página Inicial</title>
	</head>
	<body>
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
									<a href="#" class="nav-link" role="button" id="dropRelacionamento" data-bs-toggle="dropdown" aria-expanded="false">Relacionamento</a>
									<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropRelacionamento">
										<li><a href="index.php" class="dropdown-item">Lista</a></li>
										<li><a href="cadastraRrelacionamento.php" class="dropdown-item">Cadastrar</a></li>
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
						<button type="button" class="btn btn-success btn-lg"><i class="bi bi-plus-lg"></i></button>
						<button type="button" class="btn btn-warning btn-lg"><i class="bi bi-pen"></i></button>
						<button type="button" class="btn btn-danger btn-lg"><i class="bi bi-trash"></i></i></button>
					</div>
				</div>
				<div class="d-none d-sm-block ">
					<div class="d-flex gap-3 my-3">
						<button type="button" class="btn btn-success">Cadastrar</button>
						<button type="button" class="btn btn-warning">Editar</button>
						<button type="button" class="btn btn-danger">Remover</button>
					</div>
				</div>
			</div>
		</main>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>
