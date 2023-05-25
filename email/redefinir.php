<?php
include('db.php');

$email = $_SESSION['email'];

?>
<html>
<body>
<?php
if(isset($_GET['token'])){
    $token = $_GET['token'];
    if($token != $_SESSION['token']){
        die('O token não corresponde');
    }else{
        ?>

        <div class="bg_login">
            <div class="box_esqueci_a_senha">
                <?php

                $consulta = $conn->prepare("SELECT * FROM dono WHERE email = '$email'");

                $consulta->execute();

                    if(isset($_POST['redefinirsenha'])){
                        $senha = $_POST['senha'];
                        $criptografada = md5($senha);
                        $consulta = $conn->prepare("UPDATE dono SET senha = '$criptografada' WHERE email = '$email'");
                        $consulta->execute();
                        echo 'A sua senha foi redefinida com sucesso. <a href="home.php"> Ir para login </a>';
                    }
               
                ?>

                <div class="head_login">
                    <h2><i class="fas fa-lock"></i> Redefinir a minha senha</h2>
                </div>

                <form method="POST">
                    <div class="input_group">
                        <label for="senha">Digite a sua nova senha</label>
                        <input type="password" id="senha" name="senha">
                    </div>

                    <div class="input_group">
                        <input type="submit" name="redefinirsenha" value="Redefinir">
                    </div>
                </form>

                <div class="direitos">
                    <p>Todos os direitos reservados</p>
                </div>
            </div>
        </div>

        <?php
    }
    ?>

    <?php
}else{
    echo 'Precisa de um token';
}
?>
</body>
</html>