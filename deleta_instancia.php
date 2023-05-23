<?php 

include 'db.php';

$id_instancia = $_GET['id_instancia'];

$query = "DELETE FROM instancias WHERE id_instancia = $id_instancia";

mysqli_query($conexao, $query);

header('location:index.php?pagina=instancias');