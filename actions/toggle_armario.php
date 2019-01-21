<?php

include_once '../init/init.php';
$pag = "../armarios.php";

if(isset($_GET['cd']) and !empty($_GET['cd'])){
	$consulta = $admin->consultar_armario($_GET['cd']);

	if(!empty($consulta)){
		//O armário foi encontrado
		$armario = $consulta->fetch_object();
		if(!$admin->toggle("armario", $_GET['cd'])){
			$admin->alert("Ocorreu um erro!");
		}
		$admin->redirect($pag."?local=".$armario->id_local);
	}else{
		//O armário não foi encontrado
		$admin->redirect($pag);
	}
}else{
	$admin->redirect($pag);
}