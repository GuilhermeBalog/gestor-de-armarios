<?php

include_once "../init/init.php";

if(isset($_GET["cd"]) and !empty($_GET["cd"])){
    $resultados = $admin->consultar_local($_GET["cd"]);

    if(!empty($resultados)){
        //O código do local existe
        $sucesso = $admin->toggle("local", $_GET["cd"]);

        if($sucesso){
            $admin->redirect("../locais.php");
        }else{
            $admin->alert("Ocorreu um erro!");
            $admin->redirect("../locais.php");
        }
    }else{
        //O código do local não existe
        $admin->redirect("../locais.php");
    }
}else{
    $admin->redirect("../locais.php");
}