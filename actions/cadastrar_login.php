<?php

include_once "../init/init.php";

if(isset($_POST["nm_user"]) and isset($_POST["tx_login"]) and isset($_POST["tx_pass"])){
    if(!empty($_POST["nm_user"]) and !empty($_POST["tx_login"]) and !empty($_POST["tx_pass"])){
        $resultado = $admin->cadastrar_usuario($_POST["nm_user"], $_POST["tx_login"], $_POST["tx_pass"]);

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