<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Cadastrar Relacionamento</title>
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
                                <a href="#" class="nav-link active" aria-current="page" role="button" id="dropRelacionamento" data-bs-toggle="dropdown" aria-expanded="false">Relacionamento</a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropRelacionamento">
                                    <li><a href="index.php" class="dropdown-item">Lista</a></li>
                                    <li><a href="cadastraRrelacionamento.php" class="dropdown-item active" aria-current="page">Cadastrar</a></li>
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
        <a href="index.php" class="btn btn-secondary my-3"><i class="bi bi-arrow-return-left"></i> Voltar</a>
        <div class="row justify-content-center">
            <div class="col-auto">
                <h2>Cadastrar Relacionamento</h2>
                <?php
                    require_once("controle/ControleCurso.php");
                    require_once("controle/ControleTurma.php");
                    $cC = new ControleCurso();
                    $cT = new ControleTurma();
                    $cursos = $cC->selecionarTodos();
                    $turmas = $cT->selecionarTodos();
                ?>
                <form class="needs-validation" method="POST" action="cRelacionamento.php" novalidate>
                    <div>
                        <label for="matricula" class="form-label">Matricula do Aluno:</label>
                        <input id="matricula" class="form-control" type="text" name="aluno" required>
                    </div> 
                    <div>
                        <label for="id_curso" class="form-label">Curso:</label> 
                        <select name="curso" class="form-select" id="">
                            <?php
                                foreach ($cursos as $curso) {
                                    echo "<option value='{$curso->getId()}'>{$curso->getNome()} -- {$curso->getCoordenador()}</option>";
                                }
                            ?> 
                        </select>
                    </div>
                    <div>
                        <label for="id_turma" class="form-label">Turma:</label> 
                        <select name="turma" class="form-select" id="">
                            <?php
                                foreach ($turmas as $turma) {
                                    echo "<option value='{$turma->getId()}'>{$turma->getSerie()}</option>";
                                }
                            ?> 
                        </select>
                    </div>
                    <div class="mt-3">
                        <input type="submit" class="btn btn-success" value="Cadastrar">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="js/Ajax.js"></script>
	<script src="js/app.js"></script>
  </body>
</html>
