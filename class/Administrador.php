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

    //Inativa um registro de uma tabela
    public function toggle($tabela, $cd){
        $select = "SELECT st_$tabela as status from tb_$tabela where cd_$tabela = $cd";
        $query = $this->mysqli->query($select);

        if($query->num_rows > 0){
            $dados = $query->fetch_object();

            if($dados->status == '1'){
                $novo = '0';
            }else if($dados->status == '0'){
                $novo = '1';
            }else{
                return false;
            }

            $update = "UPDATE tb_$tabela set st_$tabela = $novo where cd_$tabela = $cd";
            if($this->mysqli->query($update)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
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
    public function atualizar_usuario($cd, $nome, $tx_login, $senha = ""){
        $sql = "UPDATE tb_login set nm_user = '$nome', tx_login = '$tx_login'";
        if($senha != ""){
            $senha = $this->encriptar_senha($senha);
            $sql .= ", tx_pass = '$senha'";
        }
        $sql .= " where cd_login = '$cd'";

        if($this->mysqli->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    //Consulta os dados dos usuários
    public function consultar_usuario($cd = ""){
        $sql = "SELECT * from tb_login";
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


    //Atualizar os dados de um aluno
    public function atualizar_aluno($cd, $nome, $ano, $curso, $status){
        $sql = "UPDATE tb_aluno set nm_aluno = '$nome', nr_ano = '$ano', id_curso = '$curso', st_aluno = '$status' where cd_aluno = $cd";

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

    //Cadastrar novos locais
    public function cadastrar_local($nome){
        $sql = "INSERT into tb_local values(null, '$nome')";
        if($this->mysqli->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    //Atualizar os dados de um um local
    public function atualizar_local($cd, $nome, $status){
        $sql = "UPDATE tb_local set nm_local = '$nome', st_local = '$status' where cd_local = $cd";
        if($this->mysqli->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    //Consultar os dados de um local
    public function consultar_local($cd = ""){
        $sql = "SELECT * from tb_local";
        if($cd != ""){
            $sql .= " where cd_local = $cd";
        }
        $query = $this->mysqli->query($sql);

        if($query->num_rows > 0){
            return $query;
        }else{
            return null;
        }
    }

    //Cadastrar novos cursos
    public function cadastrar_curso($sigla, $nome){
        $sql = "INSERT into tb_curso values(null, '$sigla', '$nome', 1)";
        if($this->mysqli->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    //Atualizar os dados de um curso
    public function atualizar_curso($cd, $sigla, $nome, $status){
        $sql = "UPDATE tb_curso set sg_curso = '$sigla', nm_curso = '$nome', st_curso = '$status' where cd_curso = $cd";
        if($this->mysqli->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    //Consultar os dados de um curso
    public function consultar_curso($cd = ""){
        $sql = "SELECT * from tb_curso";
        if($cd != ""){
            $sql .= " where cd_curso = $cd";
        }

        $query = $this->mysqli->query($sql);

        if($query->num_rows > 0){
            return $query;
        }else{
            return null;
        }
    }

    //Cadastrar um aluguel de armário
    public function cadastrar_aluguel($id_aluno, $id_armario, $dt_aluguel, $vl_aluguel){
        $sql = "INSERT INTO tb_aluguel values (null,'$id_aluno','$id_armario','$dt_aluguel','$vl_aluguel')";

        if($this->mysqli->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    //Atualiza os dados de um aluguel
    public function atualizar_aluguel($cd_aluguel, $id_aluno, $id_armario, $dt_aluguel, $vl_aluguel){
        $sql = "UPDATE tb_aluguel set id_aluno = '$id_aluno', id_armario = '$id_armario', dt_aluguel = '$dt_aluguel', vl_aluguel = '$vl_aluguel' where cd_aluguel = $cd_aluguel";

        if($this->mysqli->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    //Consultar aluguel
    public function consultar_aluguel($cd = "", $armario = ""){
        $sql = "SELECT * from tb_aluguel";
        if($cd != "") {
            $sql .= " where cd_aluguel = $cd";
        }
        if($armario != ""){
            $sql .= " where id_armario = $armario and st_aluguel = 1";
        }
        $query = $this->mysqli->query($sql);

        if($query->num_rows > 0){
            return $query;
        }else{
            return null;
        }
    }

    //Cadastrar novos armarios
    public function cadastrar_armario($cd = null, $local){
        $sql = "INSERT into tb_armario values($cd, '$local', 1)";
        if($this->mysqli->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    //Atualizar os dados de um armário
    public function atualizar_armario($cd, $local, $status){    
        $sql = "UPDATE tb_armario set id_local = '$local', st_armario = '$status' where cd_armario = $cd";
        if($this->mysqli->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    //Consultar os dados de um armário
    public function consultar_armario($cd = "", $local = ""){
        $sql = "SELECT * from tb_armario";
        if($cd != ""){
            $sql .= " where cd_armario = $cd";
        }
        if($local != ""){
            $sql .= " where id_local = $local";
        }
        $query = $this->mysqli->query($sql);

        if($query->num_rows > 0){
            return $query;
        }else{
            return null;
        }
    }

    public function contar_ocupacao(){
        $sql_total = "SELECT count(cd_armario) as qt_armarios from tb_armario where st_armario = 1";
        $query_total = $this->mysqli->query($sql_total);
        $dados_total = $query_total->fetch_object();
        $total = $dados_total->qt_armarios;
        if($total == 0){
            $total = 1;
        }

        $sql_ocupados = "SELECT id_armario from tb_aluguel where st_aluguel = 1 group by id_armario";
        $query_ocupados = $this->mysqli->query($sql_ocupados);
        $ocupados = $query_ocupados->num_rows;

        $ocupacao = ($ocupados / $total) * 100;
        return $ocupacao;
    }


}