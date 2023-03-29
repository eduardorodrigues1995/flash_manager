<?php
define('HOST', 'localhost');
define('USER', 'eduardo_rodrigues');
define('PASS', 'dlXmgKpcGx3FE]L[');
define('DB_NAME', 'flash_manager_db');

try {
  $pdo = new PDO("mysql:host=".HOST.";dbname=".DB_NAME, USER, PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
