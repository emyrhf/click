<?php
class Usuario{
    private $conn;
    private $nome;
    private $email;
    private $senha;
    private $username;

    function __construct($conn){
        $this->conn = $conn;
    }
    function get_nome(){
        return $this->nome;
    }
    function set_nome($nome){
        $this->nome = $nome; 
    }
    function get_email(){
        return $this->email;
    }
    function set_email($email){
        $this->email = $email;
    }
    function get_senha(){
        return $this->senha;
    }
    function set_senha($senha){
        $this->senha = $senha;
    }
    function get_username(){
        return $this->username;
    }
    function set_username($username){
        $this->username = $username; 
    }

    function cadastrar($nome, $email, $senha, $username, $profile, $header, $adm) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario (email, senha) VALUES 
            (?, ?)";
        $sqli = "INSERT INTO perfil (nome, email, username, img_perfil, header, adm) VALUES 
            (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $email, $senhaHash);
        
        $stmti = $this->conn->prepare($sqli);
        $stmti->bind_param("ssssss", $nome, $email, $username, $profile, $header, $adm );
        if ($stmt->execute() && $stmti->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>