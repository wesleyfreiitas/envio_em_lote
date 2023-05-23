<?php 

include 'db.php';

$descricao_instancia = $_POST['descricao_instancia'];
$instancia = $_POST['instancia'];
$token = $_POST['token'];

$query = "INSERT INTO instancias (descricao_instancia, instancia, token) VALUES('$descricao_instancia', '$instancia', '$token')";

mysqli_query($conexao, $query);

header('location:index.php?pagina=instancias');