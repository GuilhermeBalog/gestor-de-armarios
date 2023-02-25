<?php

include_once '../init/init.php';

if(isset($_GET['cd']) and !empty($_GET['cd'])){
	$consulta = $admin->consultar_curso();
	if(!empty($consulta)){

		echo "<select name='id_curso' id='editar_id_curso'>";
		while($curso = $consulta->fetch_object()){
			$selected = "";
			if($curso->cd_curso == $_GET['cd']){
				$selected = "selected";
			}
			echo "<option value='$curso->cd_curso' $selected>$curso->nm_curso</option>";
		}
		echo "</select>";
		echo "<label for='editar_id_curso'>Curso</label>";
	}
}