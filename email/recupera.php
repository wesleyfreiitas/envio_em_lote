<?php

include('db.php');
include('Email.php');

$email = $_POST['email'];

if (isset($_POST['esqueciasenha'])) {
    $token = uniqid();
    $_SESSION['token'] = $token;

    $consulta = $conn->prepare("SELECT * FROM dono WHERE email = '$email'");
    $consulta->execute();

        $info = $consulta->fetch();

        if ($info['email'] == $email) {

        $mail = new Email('smtp.gmail.com', 'wesleydefreiitas01@gmail.com', 'qyxgasvbvgewcqvj', 'Cantina pet');
        $mail->enviarPara($_POST['email'], $info['nomedono']);
        //A url que estamos passando na variável $url é para onde o usuário será mandado quando clicar no link
        // recebido no email
        $url = 'http://localhost:8080/study_pdo/redefinir.php';
        //A variável $corpo é onde se encontra o texto do email, onde estamos informando em um link a
        // url para onde o usuário será mandado ao clicar no link recebido no email e com um token único que
        // foi gerado quando ele clicou em redefinir a senha.
        $corpo = 'Olá ' . $info['nomedono'] . ', <br>
           Voce solicitou a redefinição de senha no Catnina Pet. Acesse o link abaixo para redefinir sua senha.<br>
           <h3><a href="' . $url . '?token=' . $_SESSION['token'] . '">Definir a sua senha</a></h3>';

        $informacoes = ['Assunto' => 'Confirmação de cadastro', 'Corpo' => $corpo];
        
        $mail->formatarEmail($informacoes);
        
        $mail->enviarEmail();
       
        echo 'As orientações para criar uma nova senha no site tal foram enviadas ao seu e-mail.';

} else {
    echo 'Não encontramos esse <b>email</b> em nossa base de dados.';
}
}