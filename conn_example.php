<?php
//definindo as credenciais
$user = "root";
$pass = "password";
$local = "Localhost";
$db = "database name";

try{
    $conn = new PDO ("mysql:host=$local;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Erro ao fazer conexão: " . $e->getMessage();
}
