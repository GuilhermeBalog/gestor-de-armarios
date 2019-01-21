<div class="row modal-content">
	<?php
	include_once '../init/init.php';

	if(isset($_GET['armario'])){
		$cd_armario = $_GET['armario'];
		
		$query_armario = $admin->consultar_armario($cd_armario);
		if(!empty($query_armario)){
			$armario = $query_armario->fetch_object();
		}
		echo "<h4>Armário #$cd_armario</h4>";

		if($armario->st_armario == 0){
			echo "<h5 class='grey-text text-darken-1'><i>Este armário está desativado</i></h5>";
			$icon = "replay";
			$text = "Reativar armário";
			$cor = "green";
		}else if($armario->st_armario == 1){
			$icon = "delete";
			$text = "Desativar armário";
			$cor = "red";
		}
		
		$consulta = $admin->consultar_aluno_armario($cd_armario);
		if(!empty($consulta)){
			if($consulta->num_rows > 1){
				echo "<h5>Alunos atuais:</h5>";
			}else{
				echo "<h5>Aluno atual:</h5>";
			}
			while($aluno = $consulta->fetch_object()){
				echo "<p>$aluno->RM - $aluno->Nome do $aluno->Sala</p>";
			}
		}

		$historico = $admin->consultar_aluno_armario($cd_armario, 0);
		if(!empty($historico)){
			echo "<h5>Histórico de Alunos:</h5>";
			while($aluno = $historico->fetch_object()){
				echo "<p>$aluno->RM - $aluno->Nome do $aluno->Sala</p>";
			}
		}

		if(empty($consulta) and empty($historico)){
			echo "<p>Este armário ainda não foi usado!</p>";
		}
		?>
</div>
<div class="modal-footer">
	<div class="col s12 center">
	<?php
		echo "<a href='actions/toggle_armario.php?cd=$cd_armario' class='btn $cor'>";
		echo "<i class='material-icons left'>$icon</i>";
		echo $text;
		echo "</a>";
	}
	?>
	</div>
</div>