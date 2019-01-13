<?php

include_once "../init/init.php";

if(isset($_POST["nm_curso"]) and isset($_POST["sg_curso"])){
    if(!empty($_POST["nm_curso"]) and !empty($_POST["sg_curso"])){
        $resultado = $admin->cadastrar_curso($_POST["sg_curso"], $_POST["nm_curso"]);

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