<?php 

include 'db.php';

$id_instancia = $_POST['id_instancia'];
$descricao_instancia = $_POST['descricao_instancia'];
$instancia = $_POST['instancia'];
$token = $_POST['token'];


$query = "UPDATE instancias SET descricao_instancia='$descricao_instancia', instancia='$instancia', token='$token' WHERE id_instancia = $id_instancia";

#print($query);
mysqli_query($conexao, $query);

header('location:index.php?pagina=instancias');