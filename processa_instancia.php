<?php 

include 'db.php';

$descricao_instancia = $_POST['descricao_instancia'];
$instancia = $_POST['instancia'];
$token = $_POST['token'];
$usuario = $_POST['usuario'];
$numero = $_POST['numero'];

$query = "INSERT INTO instancias (descricao_instancia, instancia, token, numero) VALUES('$descricao_instancia', '$instancia', '$token', '$numero')";

mysqli_query($conexao, $query);


$query = "select * from usuarios where usuario = '$usuario'";
$select = mysqli_query($conexao, $query);

while ($linha = mysqli_fetch_array($select)) { 
    $id_usuario = $linha['id'] ;
}
echo $id_usuario;
$query = "select * from instancias where instancia = '$instancia'";
$select = mysqli_query($conexao, $query);

while ($linha = mysqli_fetch_array($select)) { 
    $id_instancia = $linha['id_instancia'] ;
}
echo $id_instancia;

$query = "INSERT INTO INSTANCIAS_USUARIOS(id, id_instancia) VALUES('$id_usuario', '$id_instancia')";

mysqli_query($conexao, $query);

header('location:index.php?pagina=instancias');