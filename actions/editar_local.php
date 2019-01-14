<?php

include_once "../init/init.php";

if(isset($_POST["nm_local"]) and isset($_POST["st_local"]) and isset($_POST["cd_local"])){
    if(!empty($_POST["nm_local"]) and !empty($_POST["st_local"]) and !empty($_POST["cd_local"])){
        if($_POST["st_local"] == "Ativo"){
            $_POST["st_local"] = "1";
        }else{
            $_POST["st_local"] = "0";
        }
        $resultado = $admin->atualizar_local($_POST["cd_local"], $_POST["nm_local"], $_POST["st_local"]);

        if($resultado){
            $admin->redirect("../locais.php");
        }else{
            $admin->redirect("../locais.php");
        }
    }else{
        $admin->redirect("../locais.php");
    }
}else{
    $admin->redirect("../locais.php");
}