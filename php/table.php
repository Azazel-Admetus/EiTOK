<?php
require_once "conn.php";
$stmt= $conn->prepare("ALTER TABLE usuarios ADD COLUMN data DATE NOT NULL");
if ($stmt->execute()){
    echo "Coluna criada com sucesso";
} else{
    echo "Erro ao criar coluna";
}