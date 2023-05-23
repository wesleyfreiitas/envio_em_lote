<!DOCTYPE html>
<html>
<head>
	<title>Batch Shipping</title>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


	<link rel="stylesheet" href="css/estilo.css">

</head>

<body>
<header>
		<div class="container">
			<div id="menu">
				<a href="?pagina=instancias">Instâncias</a>
				<a href="?pagina=envios">Envios</a>
				<!-- <a href="?pagina=matriculas">Qualquer outra coisa</a> -->
				<?php if(isset($_SESSION['login'])){ ?>
					<a href="logout.php">
						<?php echo $_SESSION['usuario']; ?> 
						(sair)		
					</a>
				<?php } ?>
			</div>
		</div>
	</header>

	<div id="conteudo" class="container">