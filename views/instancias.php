<a class="btn btn-success" href="?pagina=inserir_instancia">Inserir nova instancia</a>

<table class="table table-hover table-striped" id="instancias">
	<thead>
		<tr>
			<th>Descrição</th>
			<th>Instancia</th>
			<th>Token</th>
			<th>Editar</th>
			<th>Deletar</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while ($linha = mysqli_fetch_array($consulta_instancias)) {
			echo '<tr><td >' . $linha['descricao_instancia'] . '</td>';
			echo '<td >' . $linha['instancia'] . '</td>';
			echo '<td>' . $linha['token'] . '</td>';
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