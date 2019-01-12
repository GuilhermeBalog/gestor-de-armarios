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

    // Cadastrar novos alunos
    public function cadastrar_aluno($nome, $ano, $curso){
        $sql = "INSERT into tb_aluno values(null, '$nome', '$ano', '$curso', 1)";

        if($this->mysqli->query($sql)){
            return true;
        }else{
            return false;
        }
    }


    //Alterar os dados de um aluno
    public function alterar_aluno($cd, $nome, $ano, $curso, $status){
        $sql = "UPDATE tb_aluno set nm_aluno = $nome, nr_ano = $ano, $id_curso = $curso, $st_aluno = status";

        if($this->mysqli->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    //Consultar dados de um aluno
    public function consultar_aluno($cd = ""){
        $sql = "SELECT * from tb_aluno";
        if($cd != ""){
            $sql .= " where cd_aluno = $cd ";
        }

        $query = $this->mysqli->query($sql);

        if($query->num_rows > 0){
            return $query;
        }else{
            return null;
        }
    }

    //Inativar ou Ativar um aluno
    public function toggle_aluno($cd){
        $select = "SELECT st_aluno as status from tb_aluno where cd_aluno = $cd";
        $query = $this->mysqli->query($select);

        if($query->num_rows > 0){
            $dados = $query->fetch_object();
            if($dados->status == 1){
                $novo = 0;
            }else if($dados->status == 0){
                $novo = 1;
            }else{
                return false;
            }

            $update = "UPDATE tb_aluno set st_aluno = $novo";
            if($this->mysqli->query($update)){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }
}