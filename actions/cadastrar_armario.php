<?php

include_once '../init/init.php';
$pagina = '../armarios.php';

if(isset($_POST['cd_armario']) and isset($_POST['id_local'])){
	if(!empty($_POST['cd_armario']) and !empty($_POST['id_local'])){
		$cadastro = $admin->cadastrar_armario($_POST['cd_armario'], $_POST['id_local']);

		if($cadastro){
			$admin->redirect($pagina.'?local='.$_POST['id_local']);
		}else{
			$admin->redirect($pagina);
		}
	}
}else if(isset($_POST['nr_inicio']) and isset($_POST['nr_fim']) and isset($_POST['id_local'])){
	if(!empty($_POST['nr_inicio']) and !empty($_POST['nr_fim']) and !empty($_POST['id_local'])){
		for ($i = $_POST['nr_inicio']; $i <= $_POST['nr_fim']; $i++){ 
			$admin->cadastrar_armario($i, $_POST['id_local']);
		}
		$admin->redirect($pagina.'?local='.$_POST['id_local']);
	}
}else{
	$admin->redirect($pagina);
}