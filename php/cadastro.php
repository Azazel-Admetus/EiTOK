<?php
//referenciando o arquivo de conexão
require_once "conn.php";
//verificando se o form foi enviado 
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome_usuario = $_POST['username'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //verifico se os  campos estão vazios
    if (!empty($nome_usuario) && !empty($email) && !empty($senha)){
        //inserindo no bd 
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, email, senha) VALUES(:nome, :email, :senha)");
        $stmt->bindParam(":nome", $nome_usuario);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        if ($stmt->execute()){
            header("Location: ../html/cadastro.html?insert=True");
            exit;
        }else{
            header("Location: ../html/cadastro.html?insert=False");
            exit;
        }
    }

}