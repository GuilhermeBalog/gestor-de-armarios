<?php

include_once "../init/init.php";

if(isset($_GET["cd"]) and !empty($_GET["cd"])){
    $resultados = $admin->consultar_curso($_GET["cd"]);

    if(!empty($resultados)){
        //O código do curso existe
        $sucesso = $admin->toggle("curso", $_GET["cd"]);

        if($sucesso){
            $admin->redirect("../cursos.php");
        }else{
            $admin->alert("Ocorreu um erro!");
            $admin->redirect("../cursos.php");
        }
    }else{
        //O código do curso não existe
        $admin->redirect("../cursos.php");
    }
}else{
    $admin->redirect("../cursos.php");
}