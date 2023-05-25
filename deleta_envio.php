<?php 

include 'db.php';

$id_envio = $_GET['id_envio'];

$query = "DELETE FROM ENVIOS WHERE ID_ENVIO = $id_envio";

mysqli_query($conexao, $query);

header('location:index.php?pagina=envios');
