<?php

include_once "../init/init.php";

if(isset($_POST["nm_user"]) and isset($_POST["tx_login"]) and isset($_POST["cd_login"])){
    if(!empty($_POST["nm_user"]) and !empty($_POST["tx_login"]) and !empty($_POST["cd_login"])){
        if(isset($_POST["tx_pass"]) and !empty($_POST["tx_pass"])){
            $resultado = $admin->atualizar_usuario($_POST["cd_login"], $_POST["tx_login"], $_POST["nm_user"], $_POST["tx_pass"]);
        }else{
            $resultado = $admin->atualizar_usuario($_POST["cd_login"], $_POST["tx_login"], $_POST["nm_user"]);
        }

        if($resultado){
            $admin->redirect("../administradores.php");
        }else{
            $admin->redirect("../administradores.php");
        }
    }else{
        $admin->redirect("../administradores.php");
    }
}else{
    $admin->redirect("../administradores.php");
}