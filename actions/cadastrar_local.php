<?php

include_once "../init/init.php";

if(isset($_POST["nm_local"])){
    if(!empty($_POST["nm_local"])){
        $sucesso = $admin->cadastrar_local($_POST["nm_local"]);

        if($sucesso){
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