<?php
require_once "conn.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    if(!empty($email) && !empty($senha) ){
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $dados = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($senha, $dados['senha'])){
                session_start();
                $_SESSION['id'] = $dados['id'];
                header("Location: ../html/inicio.html");
                exit;
            }else{
                header("Location:../html/login.html?pass=False");
                exit;
            }
        }else{
            header("Location: ../html/login.html?email=False");
            exit;
        }
    }else{
        header("Location: ../html/login.html?empty=True");
        exit;
    }
}