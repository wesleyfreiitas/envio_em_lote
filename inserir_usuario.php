<?php
include 'header.php';
?>
<?php if (!isset($_GET['editar'])) { ?>

	<h1>Cadastro de usuário</h1>

	<form method="POST" action="processa_usuario.php">
		<br>
		<label class="badge badge-secondary">Nome</label><br>
		<input class="form-control" type="text" name="nome" placeholder="Insira seu nome">
		<br><br>
		<label class="badge badge-secondary">Email:</label><br>
		<input class="form-control" type="email" name="usuario" placeholder="Insira seu e-mail">
		<br><br>
		<label class="badge badge-secondary">CNPJ:</label><br>
		<input class="form-control" type="text" name="cnpj" placeholder="Insira seu CNPJ">
		<br><br>
		<label class="badge badge-secondary">Senha:</label><br>
		<input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
		<br><br>
		<label class="badge badge-secondary">Confirma Senha:</label><br>
		<input type="password" class="form-control" placeholder="Confirme sua senha">
		<br><br>
		<input type="submit" class="btn btn-success" value="Cadastrar">
	</form>

<?php } else { ?>
	<?php while ($linha = mysqli_fetch_array($consulta_instancias)) { ?>
		<?php if ($linha['id_instancia'] == $_GET['editar']) { ?>
			<h1>Editar instancia</h1>
			<form method="post" action="edita_instancia.php">
				<input type="hidden" name="id_instancia" value="<?php echo $linha['id_instancia']; ?>">
				<br>
				<label class="badge badge-secondary">Descrição instancia:</label><br>
				<input class="form-control" type="text" name="descricao_instancia" placeholder="Insira o nome do instancia" value="<?php echo $linha['descricao_instancia']; ?>">
				<br><br>
				<label class="badge badge-secondary">Instancia:</label><br>
				<input class="form-control" type="text" name="instancia" placeholder="Insira o nome do instancia" value="<?php echo $linha['instancia']; ?>">
				<br><br>
				<label class="badge badge-secondary">Token:</label><br>
				<input class="form-control" type="text" name="token" placeholder="Insira o Token" value="<?php echo $linha['token']; ?>"><br><br>
				<input class="btn btn-success" type="submit" value="Editar instancia">
			</form>
		<?php } ?>
	<?php } ?>
<?php } ?>

<?php
include 'footer.php';
?>