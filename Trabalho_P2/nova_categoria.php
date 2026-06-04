<?php
    require_once('cabecalho.php');
?>

<style>
    /* Injetando as cores da ALucar no botão */
    .btn-alucar {
        background: linear-gradient(90deg, #6f42c1, #0d6efd, #d63384);
        color: white;
        border: none;
    }
    .btn-alucar:hover {
        color: white;
        opacity: 0.9;
    }
</style>

<div class="card shadow-sm p-4 mt-3" style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-4 text-center">Novo Grupo de Veículos 🐺</h2>
    <form method="post">
        <div class="mb-3">
              <label for="nome" class="form-label fw-bold">Nome do Grupo (Ex: Sedan, SUV)</label>
              <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-alucar w-100 fw-bold">Cadastrar Grupo</button>
    </form>
    
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('conexao.php');
        $nome = $_POST['nome'];
        try{
          $stmt = $pdo->prepare('INSERT INTO categoria (nome) VALUES (?);');
          if($stmt->execute([$nome])){
            echo "<div class='alert alert-success mt-3 fw-bold'>Cadastro realizado com sucesso!</div>";
          } else {
            echo "<div class='alert alert-danger mt-3 fw-bold'>Erro ao cadastrar! Tente novamente.</div>";
          }
        } catch(Exception $e){
          echo "<div class='alert alert-danger mt-3'>Erro: ".$e->getMessage()."</div>";
        }
      }
    ?>
</div>

<?php
    require_once('rodape.php');
?>