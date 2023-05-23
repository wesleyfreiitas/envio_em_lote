<?php if(!isset($_GET['editar'])){ ?>

<h1>Inserir nova instancia</h1>

<form method="post" action="processa_instancia.php">
	<br>
	<label class="badge badge-secondary">Descricao instancia:</label><br>
	<input class="form-control" type="text" name="descricao_instancia" placeholder="Insira o nome do instancia">
	<br><br>
	<label class="badge badge-secondary">Instancia:</label><br>
	<input class="form-control" type="text" name="instancia" placeholder="Insira a instancia">
	<br><br>
	<label class="badge badge-secondary">Token:</label><br>
	<input class="form-control" type="text" name="token" placeholder="Insira o token"><br><br>
	<input type="submit" class="btn btn-success" value="Inserir instancia">
</form>

<?php } else { ?>
	<?php while($linha = mysqli_fetch_array($consulta_instancias)){ ?>
		<?php if($linha['id_instancia'] == $_GET['editar']){ ?>
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
					<input class="form-control"  type="text" name="token" placeholder="Insira o Token" value="<?php echo $linha['token']; ?>"><br><br>
					<input class="btn btn-success" type="submit" value="Editar instancia">
				</form>
			<?php } ?>
	<?php } ?>
<?php } ?>