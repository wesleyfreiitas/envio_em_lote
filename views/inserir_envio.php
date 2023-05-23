<?php if (!isset($_GET['editar'])) { ?>

	<h1>Cadastro de envio</h1>

	<form enctype="multipart/form-data" action="processa_envio.php" method="POST">

		<br>
		<label class="badge badge-secondary">Mensagem para envio:</label><br>
		<input class="form-control" type="text" name="mensagem" placeholder="Insira a mensagem que será enviada">
		<br><br>
		<label class="badge badge-secondary">Instância do canal</label><br>
		<input class="form-control" type="text" name="instancia" placeholder="Insira a instância"><br><br>

		<label class="badge badge-secondary">Token da instância</label><br>
		<input class="form-control" type="text" name="token" placeholder="Insira o token da instância"><br><br>

		<label class="badge badge-secondary">Importar(.csv)</label><br>
		<input class="form-control" type="file" name="userfile"><br><br>

		<input type="submit" class="btn btn-success" value="Cadastrar envio">
	</form>


<?php } else { ?>
	<?php while ($linha = mysqli_fetch_array($consulta_envios)) { ?>
		<?php if ($linha['id_envio'] == $_GET['editar']) { ?>

			<h1>Editar envio</h1>
			<form method="post" action="edita_envio.php">
				<input type="hidden" name="id_envio" value="<?php echo $linha['id_envio']; ?>">
				<br>
				<label class="badge badge-secondary">Mensagem para envio:</label><br>
				<input class="form-control" type="text" name="mensagem" placeholder="Insira a mensagem que será enviada" value="<?php echo $linha['mensagem']; ?>">
				<br><br>
				<label class="badge badge-secondary">Instancia</label><br>
				<input class="form-control" type="text" name="instancia" placeholder="Insira o token da instância" value="<?php echo $linha['instancia']; ?>"><br><br>
				<input class="btn btn-success" type="submit" value="Editar envio">
			</form>
		<?php } ?>
	<?php } ?>
<?php } ?>