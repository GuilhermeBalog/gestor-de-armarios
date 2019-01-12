<?php

/* Ação de Login */
include_once "../class/Administrador.php";
$admin = new Administrador("");

if(isset($_GET["tx_login"]) and isset($_GET["tx_pass"])){
    if(!empty($_GET["tx_login"]) and !empty($_GET["tx_pass"])){
        $login = $admin->login($_GET["tx_login"],$_GET["tx_pass"]);

        //Verifica se foi executado
        if($login == true){
            //$admin->redirect("/home.php");
        }else{
            //$admin->redirect("/index.php");
        }
    }else{
        $admin->alert("É necessário preencher o formulário de acesso!");
        //$admin->redirect("../index.php");
    }
}else{
    $admin->alert("Envie o formulário de login para acessar essa página!");
    //$admin->redirect("../index.php");
}
