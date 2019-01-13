<?php

include_once "../init/init.php";

if(isset($_POST["nm_curso"]) and isset($_POST["sg_curso"]) and isset($_POST["st_curso"]) and isset($_POST["cd_curso"])){
    if(!empty($_POST["nm_curso"]) and !empty($_POST["sg_curso"]) and !empty($_POST["cd_curso"]) and !empty($_POST["st_curso"])){
        if($_POST["st_curso"] == "Ativo"){
            $_POST["st_curso"] = "1";
        }else{
            $_POST["st_curso"] = "0";
        }
        $resultado = $admin->atualizar_curso($_POST["cd_curso"], $_POST["sg_curso"], $_POST["nm_curso"], $_POST["st_curso"]);

        if($resultado){
            $admin->redirect("../cursos.php");
        }else{
            $admin->redirect("../cursos.php");
        }
    }else{
        $admin->redirect("../cursos.php");
    }
}else{
    $admin->redirect("../cursos.php");
}