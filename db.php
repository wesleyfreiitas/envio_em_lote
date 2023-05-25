<?php 

$servidor = "164.92.128.43";
$usuario = "doadmin";
$senha = "AVNS_Or4eR9D0hT42Fd1gHLG";
$db = "envios";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db);


$query = "SELECT * FROM ENVIOS";
$consulta_envios = mysqli_query($conexao, $query);

// $query = "SELECT * FROM INSTANCIAS";

// $query = "SELECT instancias_usuarios.id_instancia_usuario, instancias.descricao_instancia, usuarios.cnpj , instancias.instancia, 
// FROM instancias, usuarios, instancias_usuarios
// WHERE instancias_usuarios.id_instancia = instancias.id_instancia
// AND instancias_usuarios.id = usuarios.id";

// $consulta_instancias = mysqli_query($conexao, $query);


$query = "SELECT i.token, i.instancia, i.numero, i.descricao_instancia, i.id_instancia
FROM instancias_usuarios iu
JOIN instancias i ON iu.id_instancia = i.id_instancia
WHERE iu.id = '6'";

$consulta_instancias = mysqli_query($conexao, $query);
// mysql -u doadmin -pAVNS_Or4eR9D0hT42Fd1gHLG -h dbaas-db-2935783-do-user-12966774-0.b.db.ondigitalocean.com -P 25060 < 

// username = doadmin
// password = AVNS_Or4eR9D0hT42Fd1gHLG
// host = dbaas-db-2935783-do-user-12966774-0.b.db.ondigitalocean.com
// port = 25060
// database = defaultdb
// sslmode = REQUIRED

$query = "SELECT * FROM USUARIOS";
$consulta_usuarios = mysqli_query($conexao, $query);

$query = "SELECT instancias_usuarios.id_instancia_usuario, instancias.descricao_instancia, usuarios.cnpj 
FROM instancias, usuarios, instancias_usuarios
WHERE instancias_usuarios.id_instancia = instancias.id_instancia
AND instancias_usuarios.id = usuarios.id";

$consulta_match = mysqli_query($conexao, $query);

// try{
// 	$conn = new PDO('mysql:host=localhost;dbname=banco','root','');
// 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     //Criou-se uma conexão persistente que não se finaliza após o fim do script
//     array(PDO::ATTR_PERSISTENT => true);
// 	echo "Banco conectado";
// }catch(PDOException $e){
// 	echo $e->getMessage();
// }

// $consulta = $conn->prepare("SELECT * FROM dono WHERE email = '$email'");

// $consulta->execute();

// $token = uniqid();
// $_SESSION['token'] = $token;
// $_SESSION['email'] = $email;

// $info = $consulta->fetch();
// $mail = new Email('smtp.gmail.com', 'wesleydefreiitas01@gmail.com', 'qyxgasvbvgewcqvj', 'Cantina pet');
// $mail->enviarPara($_POST['email'], $info['nomedono']);
// //A url que estamos passando na variável $url é para onde o usuário será mandado quando clicar no link
// // recebido no email
// $url = 'http://localhost:8080/study_pdo/redefinir.php';
// //A variável $corpo é onde se encontra o texto do email, onde estamos informando em um link a
// // url para onde o usuário será mandado ao clicar no link recebido no email e com um token único que
// // foi gerado quando ele clicou em redefinir a senha.
// $corpo = 'Olá ' . $info['nomedono'] . ', <br>
//            Voce se cadastrou no Catnina Pet. Acesse o link abaixo para Defina sua senha.<br>
//            <h3><a href="' . $url . '?token=' . $_SESSION['token'] . '">Definir a sua senha</a></h3>';

// $informacoes = ['Assunto' => 'Confirmação de cadastro', 'Corpo' => $corpo];
// $mail->formatarEmail($informacoes);

// if ($mail->enviarEmail()) {
//     $data['sucesso'] = true;
// } else {
//     $data['erro'] = true;
// }