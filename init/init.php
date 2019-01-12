<?php

include_once("/class/Administrador.php");

session_start();
$admin = new Administrador($_SESSION["nm_user"]);
$admin->validar_login();
