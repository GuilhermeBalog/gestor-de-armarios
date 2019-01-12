<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/class/Administrador.php");

session_start();
$admin = new Administrador($_SESSION["nm_user"]);
$admin->validar_login();
