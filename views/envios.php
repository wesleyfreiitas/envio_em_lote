<a class="btn btn-success" href="?pagina=inserir_envio">Novo envio</a>
<table class="table table-hover table-striped" id="envios">
	<thead>
		<tr>
			<th>#ID</th>
			<th>Conteúdo</th>
			<th>Instancia</th>
			<!-- <th>Total</th> -->
			<!-- <th>Em fila</th> -->
			<!-- <th>Enviando</th> -->
			<!-- <th>Enviadas</th> -->
			<!-- <th>Erro</th> -->
			<th>Editar</th>
			<th>Deletar</th>
		</tr>
	</thead>

	<tbody>
		<?php
		while ($linha = mysqli_fetch_array($consulta_envios)) {
			echo '<tr><td >' . $linha['id_envio'] . '</td>';
			echo '<td >' . $linha['mensagem'] . '</td>';
			echo '<td>' . $linha['instancia'] . '</td>';
		?>
			<td><a href="?pagina=inserir_envio&editar=<?php echo $linha['id_envio']; ?>">

					<i class="fas fa-edit"></i>

				</a></td>
			<td><a href="deleta_envio.php?id_envio=<?php echo $linha['id_envio']; ?>">
					<i class="fas fa-trash-alt"></i>
				</a></td>
			</tr>

		<?php
		}
		?>
	</tbody>

</table>