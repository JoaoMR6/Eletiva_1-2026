<?php
    session_start();
    require_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ALucar - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .btn-alucar {
        background: linear-gradient(90deg, #6f42c1, #0d6efd, #d63384);
        color: white;
        border: none;
    }
    .btn-alucar:hover { color: white; opacity: 0.9; }
  </style>
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <h3 class="text-center mb-4">Login ALucar 🐺</h3>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" type="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input name="senha" type="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-alucar w-100 fw-bold">Entrar</button>
    </form>

    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try{
          $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
          $stmt->execute([$email]);
          $usuario = $stmt->fetch();
          
          if($usuario && password_verify($senha, $usuario['senha'])){
            $_SESSION['usuario_id'] = $usuario['id']; // Importante para identificar o cliente depois
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['tipo'] = $usuario['tipo']; 
            
            // Redirecionamento condicional
            if($usuario['tipo'] == 'gerenciador'){
                header('Location:painel_gerenciador.php');
            } else {
                header('Location:painel_usuario.php');
            }
            exit();
          } else {
            echo "<p class='text-danger mt-3 text-center fw-bold'>Credenciais inválidas!</p>";
          }
        } catch(Exception $e){
          echo "<p class='text-danger mt-3 text-center'>Erro: ". $e->getMessage() . "</p>";
        }
      }
    ?>

    <p class="text-center mt-3">
      Não tem conta? <a href="cadastro.php">Cadastre-se</a>
    </p>
  </div>
</div>
</body>
</html>