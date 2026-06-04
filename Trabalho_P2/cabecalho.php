<?php

    // Verifica se já existe uma sessão ativa antes de iniciar
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // O restante do seu cabeçalho continua aqui...

    if (!isset($_SESSION['acesso']) || $_SESSION['acesso'] == false){
        header('Location: index.php');
        exit();
    }
?>

<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ALucar - Painel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    
    .bg-alucar {
        background: linear-gradient(90deg, #6f42c1, #0d6efd, #d63384);
    }
    .navbar-brand {
        font-weight: bold;
        letter-spacing: 1px;
    }
</style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-alucar shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">ALucar 🐺</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">      
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="painel_gerenciador.php">Início</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Gerenciar Frota
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown2">
                <li><a class="dropdown-item" href="categoria.php">Categorias (Grupos)</a></li>
                <li><a class="dropdown-item" href="produto.php">Veículos (Produtos)</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Funções de Saída
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown3">
                <li><a class="dropdown-item" href="#">Relatório de Frota</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link text-warning fw-bold" aria-current="page" href="logout.php">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container py-4">