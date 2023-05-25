<a class="btn btn-success" href="?pagina=inserir_instancia">Inserir nova instancia</a>

<table class="table table-hover table-striped" id="instancias">
	<thead>
		<tr>
			<th>Descrição</th>
			<th>Instancia</th>
			<th>Token</th>
			<th>Numero</th>
			<th>Editar</th>
			<th>Deletar</th>
		</tr>
	</thead>
	<tbody>
		<?php

		$usuario = $_SESSION['usuario'];

		$query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
		$select = mysqli_query($conexao, $query);

		while ($linha = mysqli_fetch_array($select)) {
			$id_usuario = $linha['id'];
		}
		$query = "SELECT i.token, i.instancia, i.numero, i.descricao_instancia, i.id_instancia
		FROM instancias_usuarios iu
		JOIN instancias i ON iu.id_instancia = i.id_instancia
		WHERE iu.id = '$id_usuario'";

		$consulta_instancias = mysqli_query($conexao, $query);
		while ($linha = mysqli_fetch_array($consulta_instancias)) {
			echo '<tr><td >' . $linha['descricao_instancia'] . '</td>';
			echo '<td >' . $linha['instancia'] . '</td>';
			echo '<td>' . $linha['token'] . '</td>';
			echo '<td>' . $linha['numero'] . '</td>';
		?>

			<td><a href="?pagina=inserir_instancia&editar=<?php echo $linha['id_instancia']; ?>">
					<i class="fas fa-user-edit"></i>
				</a></td>
			<td><a href="deleta_instancia.php?id_instancia=<?php echo $linha['id_instancia']; ?>"><i class="fas fa-user-times"></i></a></td>
			</tr>

		<?php
		}
		?>
	</tbody>

</table>