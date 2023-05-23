<?php 

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "envios";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db);


$query = "SELECT * FROM ENVIOS";
$consulta_envios = mysqli_query($conexao, $query);

$query = "SELECT * FROM INSTANCIAS";
$consulta_instancias = mysqli_query($conexao, $query);

$query = "SELECT * FROM USUARIOS";
$consulta_usuarios = mysqli_query($conexao, $query);

// $query = "SELECT alunos_cursos.id_aluno_curso, alunos.nome_aluno, cursos.nome_curso 
// 			FROM alunos, cursos, alunos_cursos
// 			WHERE alunos_cursos.id_aluno = alunos.id_aluno
// 			AND alunos_cursos.id_curso = cursos.id_curso";
			
// $consulta_matriculas = mysqli_query($conexao, $query);

try{
	$conn = new PDO('mysql:host=localhost;dbname=banco','root','');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Criou-se uma conexão persistente que não se finaliza após o fim do script
    array(PDO::ATTR_PERSISTENT => true);
	echo "Banco conectado";
}catch(PDOException $e){
	echo $e->getMessage();
}

$consulta = $conn->prepare("SELECT * FROM dono WHERE email = '$email'");

$consulta->execute();

$token = uniqid();
$_SESSION['token'] = $token;
$_SESSION['email'] = $email;

$info = $consulta->fetch();
$mail = new Email('smtp.gmail.com', 'wesleydefreiitas01@gmail.com', 'qyxgasvbvgewcqvj', 'Cantina pet');
$mail->enviarPara($_POST['email'], $info['nomedono']);
//A url que estamos passando na variável $url é para onde o usuário será mandado quando clicar no link
// recebido no email
$url = 'http://localhost:8080/study_pdo/redefinir.php';
//A variável $corpo é onde se encontra o texto do email, onde estamos informando em um link a
// url para onde o usuário será mandado ao clicar no link recebido no email e com um token único que
// foi gerado quando ele clicou em redefinir a senha.
$corpo = 'Olá ' . $info['nomedono'] . ', <br>
           Voce se cadastrou no Catnina Pet. Acesse o link abaixo para Defina sua senha.<br>
           <h3><a href="' . $url . '?token=' . $_SESSION['token'] . '">Definir a sua senha</a></h3>';

$informacoes = ['Assunto' => 'Confirmação de cadastro', 'Corpo' => $corpo];
$mail->formatarEmail($informacoes);

if ($mail->enviarEmail()) {
    $data['sucesso'] = true;
} else {
    $data['erro'] = true;
}