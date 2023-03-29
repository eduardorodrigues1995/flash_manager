<?php

// informações de conexão com o banco de dados
define('HOST', 'localhost');
define('USER', 'eduardo_rodrigues');
define('PASS', 'dlXmgKpcGx3FE]L[');
define('DB_NAME', 'flash_manager_db');

// cria a conexão com o banco de dados
$conn = new mysqli(HOST, USER, PASS, DB_NAME);

// verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// define o charset da conexão
$conn->set_charset("utf8mb4");
