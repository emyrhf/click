<?php
class Post{
    private $conn;
    private $url;
    private $email;
    private $titulo;
    private $descricao;

    function __construct($conn){
        $this->conn = $conn;
    }
    function get_nome(){
        return $this->url;
    }
    function set_nome($url){
        $this->url = $url; 
    }
    function get_email(){
        return $this->email;
    }
    function set_email($email){
        $this->email = $email;
    }
    function get_titulo(){
        return $this->email;
    }
    function set_titulo($titulo){
        $this->titulo = $titulo;
    }
    function get_descricao(){
        return $this->email;
    }
    function set_descricao($descricao){
        $this->descricao = $descricao;
    }

    function enviar($url, $email, $titulo, $descricao) {
        $sql = "INSERT INTO posts (url, email, titulo, descricao) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $url, $email, $titulo, $descricao);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>