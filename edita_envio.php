<?php 

include 'db.php';

$id_envio = $_POST['id_envio'];
$mensagem = $_POST['mensagem'];
$instancia = $_POST['instancia'];


$query = "UPDATE ENVIOS SET mensagem='$mensagem', instancia='$instancia' WHERE id_envio = '$id_envio'";

mysqli_query($conexao, $query);

header('location:index.php?pagina=envios');
