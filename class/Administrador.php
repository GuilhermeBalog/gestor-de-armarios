<?php

include_once "Utilitarios.php";

class Administrador extends Utilitarios
{
    /* Atributos */
    public $nm_user = "";

    /* Métodos Construtor */
    public function __construct($nm_user){
        $this->nm_user = $nm_user;
        $this->mysqli = $this->db_connect();
    }

    //Cadastrar novos usuários
    public function cadastrar_usuario($nome, $login, $senha){
        $senha = $this->encriptar_senha($senha);
        $ins = "INSERT INTO tb_login values (null, '$nome', '$login', '$senha')";

        if($this->mysqli->query($ins)){
            return true;
        }else{
            return false;
        }
    }

    //Atualizar os dados de um usuário
    public function atualizar_usuario($cd, $nome, $senha){
        $senha = $this->encriptar_senha($senha);
        $ins = "UPDATE tb_login set nm_user = '$nome', tx_pass = '$senha' where cd_login = '$cd'";

        if($this->mysqli->query($ins)){
            return true;
        }else{
            return false;
        }
    }

    //Consulta os dados dos usuários
    public function consultar_usuario($cd = ""){
        $sql = "SELECT * from tb_usuario";
        if($cd != ""){
            $sql .= " where cd_login = $cd";
        }
        $query = $this->mysqli->query($sql);

        if($query->num_rows > 0){
            return $query;
        }else{
            return null;
        }
    }

    //Excluir usuários
    public function excluir_usuario($cd){
        $sql = "DELETE FROM tb_login where cd_login = $cd";

        if($this->mysqli->query($sql)){
            return true;
        }else{
            return false;
        }
    }
}