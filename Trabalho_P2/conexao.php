<?php

    // Adicionamos a porta 3307 diretamente na string de conexão (DSN)
    $dominio = "mysql:host=localhost;port=3307;dbname=projetophp;charset=utf8mb4";
    $usuario = "root";
    $senha = "";

    try {
        $pdo = new PDO($dominio, $usuario, $senha);
        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e){
        die("Erro ao conectar ao banco: " . $e->getMessage());
    }

?>