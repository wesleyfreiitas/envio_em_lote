<?php 

include 'db.php';

$nome = $_POST['nome'];
$usuario = addslashes($_POST['usuario']);
$senha = md5($_POST['senha']);
$cnpj = $_POST['cnpj'];

$query =  "INSERT INTO `usuarios`(`usuario`, `senha`, `nome`, `cnpj`) VALUES ('$usuario', '$senha', '$nome','$cnpj')";

mysqli_query($conexao, $query);

header('location:index.php?pagina=usuarios');