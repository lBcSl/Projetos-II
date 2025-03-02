<?php

Class Usuario
{
    private $pdo;
    public $msgErro = "";
    
    public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        global $msgErro;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $telefone, $email, $senha){
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindvalue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        }
        else {
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES(:n, :t, :e, :s)");
            $sql->bindvalue(":n",$nome);
            $sql->bindvalue(":t",$telefone);
            $sql->bindvalue(":e",$email);
            $sql->bindvalue(":s",md5($senha));
            $sql->execute();
            return true;

        }
    }
    public function logar($email, $senha){
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindvalue(":e",$email);
        $sql->bindvalue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true;
        }
        else{
            return false;
        }
}       
}
?>


