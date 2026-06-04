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
    <h2 class="mb-4 text-center">Novo Contrato 🐺</h2>
    <form method="post">
        <div class="mb-3">
              <label for="tipo" class="form-label fw-bold">Tipo de Contrato</label>
              <select required name="tipo" id="tipo" class="form-select">
                  <option value="diária">Diária</option>
                  <option value="semanal">Semanal</option>
                  <option value="mensal">Mensal</option>
              </select>
        </div>
        <div class="mb-3">
              <label for="valor" class="form-label fw-bold">Valor Base (R$)</label>
              <input type="text" id="valor" name="valor" class="form-control" required="" placeholder="Ex: 150.00">
        </div>
        <button type="submit" class="btn btn-alucar w-100 fw-bold">Cadastrar Contrato</button>
    </form>
    
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once('conexao.php');
        $tipo = $_POST['tipo'];
        // Substitui possível vírgula por ponto para o banco de dados não dar erro no DECIMAL
        $valor = str_replace(',', '.', $_POST['valor']); 
        
        try{
          $stmt = $pdo->prepare('INSERT INTO contrato (tipo, valor) VALUES (?, ?);');
          if($stmt->execute([$tipo, $valor])){
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