<?php
	class Conexao
	{
		private $user;
		private $pwd;
		private $driver;
		private $host;
		private $dbname;
		private $pdo;

		public function __construct($arq_configs)
		{
			try {
				if (file_exists($arq_configs)) {
					$configs = parse_ini_file($arq_configs);
					$this->user = $configs["user"];
					$this->pwd = $configs["pwd"];
					$this->driver = $configs["driver"];
					$this->host = $configs["host"];
					$this->dbname = $configs["dbname"];	

					if ($this->driver == 'mysql') {
						$this->pdo = new PDO("{$this->driver}:host={$this->host};dbname={$this->dbname}",
							$this->user, $this->pwd);
						$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						echo "Deu certo";
					} else {
						die("SGBD não suportado pelo sistema");
					}
				} else {
					die("Arquivo de configuração não encontrado");
				}
			} catch (PDOException $PDOEx) {
				echo "<script>";
				echo "alert('Erro')";
				echo "</script>";
			}
		}

		public function getPDO()
		{
			return $this->pdo;
		}

		public function fecharConexao()
		{
			$this->pdo = null;
		}
	}

