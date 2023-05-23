<?php
//Para conseguir usar a classe

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Não esque de carregar o autoload.php
require 'vendor/autoload.php';

class Email
{
    public $mailer;

    public function __construct($host = null, $username = null, $senha = null, $nome = null)
    {
        $this->mailer = new PHPMailer;
        $this->mailer->isSMTP();  // Set mailer to use SMTP
        $this->mailer->Host = $host; //'smtp.gmail.com'; // Host de disparo de emails do seu servidor
        $this->mailer->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mailer->Username = $username;   //SMTP usuário/email que vai enviar emails
        $this->mailer->Password = $senha;  // SMTP senha do usuário/email que envia email
        $this->mailer->SMTPSecure = 'TLS';      // Enable TLS encryption, `ssl` also accepted
        $this->mailer->Port = 587;       // TCP port to connect to
        $this->mailer->setFrom($username, $nome); //Enviado de
        $this->mailer->addReplyTo($username, $nome); //Responder para
        $this->mailer->isHTML(true);
        $this->mailer->CharSet = 'UTF-8';                                  // Set email format to HTML
    }

    public function enviarPara($email, $nome)
    {
        $this->mailer->addAddress($email, $nome);     // Endereço da sua empresa
    }

    public function formatarEmail($info)
    {
        $this->mailer->Subject = $info['Assunto'];
        $this->mailer->Body = $info['Corpo'];
        $this->mailer->AltBody = strip_tags($info['Corpo']); //Não lembro pq adicionar de novo, mas adiciona pra garantir.
    }

    public function enviarEmail()
    { //enviando o email
        if ($this->mailer->send()) {
            return true;
        } else {
            return false;
        }
    }
}