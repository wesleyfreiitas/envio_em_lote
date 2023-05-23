<?php

include 'db.php';

//define a pasta em que o arquivo será salvo
$uploaddir = 'uploads/';

//define o caminho completo do arquivo de destino, pegando para isto o nome do arquivo original
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

//move o arquivo temporário para o destino desejado
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

    $obj = json_encode(["tmp_name" => $uploadfile]);

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://blue-tiger-6.hooks.n8n.cloud/webhook-test/1761a873-5474-4dc1-9ebd-9b8abebabb34',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $obj,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    echo $response;


    $mensagem = $_POST['mensagem'];
    $instancia = $_POST['instancia'];
    $token = $_POST['token'];
    $arquivo = $_POST['arquivo'];

    $query = "INSERT INTO ENVIOS(mensagem, instancia, token, arquivo) VALUES('$mensagem', '$instancia', '$token', '$arquivo')";

    mysqli_query($conexao, $query);



    header('location:index.php?pagina=envios');

    echo "Arquivo enviado com sucesso.";
} else {
    echo "Falha ao fazer o upload de arquivo!";
}
