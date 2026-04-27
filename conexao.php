<?php
    $host = "127.0.0.1";
    $user = "root";
    $porta = "3306";
    $password = "ceub123456"; 
    $db = "tarefas";

    try {
        $conexao = new PDO('mysql:host='.$host.';port='.$porta.';dbname='.$db, $user, $password);
        // Mantendo os erros ativados para facilitar debug
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
?>