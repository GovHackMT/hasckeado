<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script type="text/javascript" src="/hasckeado/bootstrap/js/bootstrap.min.js"></script>
	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="/hasckeado/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/hasckeado/css/sistema.css" rel="stylesheet" type="text/css">
</head>

<header>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/hasckeado/indexLogado.php"><span>Brand</span></a>
			</div>
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Cadastro
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="/hasckeado/view/usuario.php">Usuário</a></li>
							<li><a href="/hasckeado/view/hemocentro.php">Hemocentro</a></li>
							<li><a href="/hasckeado/view/doador.php">Doador</a></li>
						</ul>
					</li>
					<li>
						<a href="/hasckeado/index.php">Sair</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>

<div id="wrap">
