<?php

$dsn = "mysql:host=localhost;dbname=frontendproject;charset=utf8";
try {
  $pdo = new PDO($dsn, 'root', 'root');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
}