<?php

include_once "Utilitarios.php";

class Administrador extends Utilitarios
{
    /* Atributos */
    public $nm_user = "";

    /* Métodos Construtor */
    public function __construct($nm_user)
    {
        $this->nm_user = $nm_user;
        $this->mysqli = $this->db_connect();
    }
}