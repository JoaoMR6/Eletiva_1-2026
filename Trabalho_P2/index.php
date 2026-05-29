<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Aluguel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <h3 class="text-center mb-4">Sistema de Aluguel de Carros</h3>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" type="email" class="form-control" placeholder="Digite seu email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input name="senha" type="password" class="form-control" placeholder="Digite sua senha" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Tipo de Acesso</label>
        <select name="tipo" class="form-control" required>
          <option value="cliente">Cliente</option>
          <option value="gerenciador">Gerenciador</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>

    <?php
      require_once('conexao.php');
      session_start();
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo']; 

        try{
          // Adicionamos o 'tipo' na consulta para garantir a validação exata
          $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ? AND tipo = ?");
          $stmt->execute([$email, $tipo]);
          $usuario = $stmt->fetch();
          
   
          $senha_correta = password_verify($senha, $usuario['senha']);
          
          if($usuario && $senha_correta){
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['acesso'] = true; 
            $_SESSION['tipo'] = $tipo;
            
            // Redirecionamento usando  função header
            if($tipo == 'gerenciador'){
                header('Location: painel_gerenciador.php');
            } else {
                header('Location: principal.php');
            }
          } else {
            echo "<p class='text-danger mt-3 text-center'>Credenciais inválidas!</p>";
          }
        } catch(Exception $e){
          echo "Erro: ". $e->getMessage();
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