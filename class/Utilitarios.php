<?php

abstract class Utilitarios
{
    /* Atributos */
    private $host     = "localhost";
    private $port     = 3307;
    private $db       = "db_gestor_de_armarios";
    private $user     = "root";
    private $pass     = "usbw";
    protected $mysqli = null;

    public function db_connect()
    {
        $conn =  new mysqli($this->host, $this->user, $this->pass, $this->db, $this->port);
        $conn->set_charset("utf8");
        return $conn;
    }

    // Função utilizada para fazer redirecionamentos
    public function redirect($pag)
    {
        echo "<script>";
        echo "window.location = '$pag';";
        echo "</script>";
    }

    //Função utilizada para gerar alertas
    public function alert($msg)
    {
        echo "<script>";
        echo "alert('$msg');";
        echo "</script>";
    }

    //Função de login
    public function login($login, $pass){
        $pass_e = $this->encriptar_senha($pass);
        $sql = "SELECT * from tb_login where tx_login = '$login' and tx_pass = '$pass_e'";
        $query = $this->mysqli->query($sql);
        if($query->num_rows > 0){
            session_start();
            $row = $query->fetch_object();
            $_SESSION['logged_in'] = true;
            $_SESSION['login'] = $login;
            $_SESSION['cd_login'] = $row->cd_login;
            $_SESSION['nm_user'] = $row->nm_user;
            return true;
        }else{
            return false;
        }
    }

    //Função de logout
    public function logout(){
        session_unset();
        session_destroy();
        $this->redirect("/index.php");
    }

    //Encripta uma string
    public function encriptar_senha($pass)
    {
        $encript = hash('sha256', md5(hash('sha256', md5(md5($pass)))));
        return $encript;
    }

    //Validar se usuário fez login
    public function validar_login()
    {
        if(isset($_SESSION["logged_in"])){
            if($_SESSION['logged_in'] == true){
            }else{
                $this->redirect($this->redirect("/index.php"));
            }
        }else{
            $this->redirect($this->redirect("/index.php"));
        }
    }
}