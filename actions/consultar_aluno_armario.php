<div class="row modal-content">
	<?php
	include_once '../init/init.php';

	if(isset($_GET['armario']) and !empty($_GET['armario']) and isset($_GET['status']) and !empty($_GET['status'])){
		$cd_armario = $_GET['armario'];
		$status = $_GET['status'];
		
		$query_armario = $admin->consultar_armario($cd_armario);
		if(!empty($query_armario)){
			$armario = $query_armario->fetch_object();
		}
		
		echo "<h4>Armário #$cd_armario";
			if($status == "red"){
				echo "<span class='red-text'><i> (Ocupado) </i></span>";
			}else if($status == "green"){
				echo "<span class='green-text'><i> (Livre) </i><span>";
			}else if($status == "grey"){
				echo "<span class='grey-text text-darken-1'><i> (Desativado) </i></span>";
			}
		echo "</h4>";
		
		$consulta = $admin->consultar_aluno_armario($cd_armario);
		if(!empty($consulta)){
			if($consulta->num_rows > 1){
				echo "<h5>Alunos atuais:</h5>";
			}else{
				echo "<h5>Aluno atual:</h5>";
			}
			?>
			<table>
				<thead>
					<tr>
						<th>RM</th>
						<th>Nome</th>
						<th>Sala</th>
						<th>Data da Compra</th>
						<th>Valor</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($aluno = $consulta->fetch_object()){
							echo "<tr>";
							echo "<td>$aluno->RM</td>";
							echo "<td>$aluno->Nome</td>";
							echo "<td>$aluno->Sala</td>";
							echo "<td>$aluno->Data</td>";
							echo "<td>$aluno->Valor</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			<?php
		}

		$historico = $admin->consultar_aluno_armario($cd_armario, 0);
		if(!empty($historico)){
			echo "<h5>Histórico de Alunos:</h5>";
			?>
			<table>
				<thead>
					<tr>
						<th>RM</th>
						<th>Nome</th>
						<th>Sala</th>
						<th>Data da Compra</th>
						<th>Valor</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($aluno = $historico->fetch_object()){
							echo "<tr>";
							echo "<td>$aluno->RM</td>";
							echo "<td>$aluno->Nome</td>";
							echo "<td>$aluno->Sala</td>";
							echo "<td>$aluno->Data</td>";
							echo "<td>$aluno->Valor</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			<?php
		}

		if(empty($consulta) and empty($historico)){
			echo "<p>Este armário ainda não foi usado!</p>";
		}
		?>
</div>
<div class="modal-footer">
	<div class="col s12 center">
	<?php
		if($armario->st_armario == 0){
			$icon = "replay";
			$text = "Reativar armário";
			$cor = "green";
		}else if($armario->st_armario == 1){
			$icon = "delete";
			$text = "Desativar armário";
			$cor = "red";
		}

		echo "<a href='actions/toggle_armario.php?cd=$cd_armario' class='btn $cor'>";
		echo "<i class='material-icons left'>$icon</i>";
		echo $text;
		echo "</a>";
	}
	?>
	</div>
</div>