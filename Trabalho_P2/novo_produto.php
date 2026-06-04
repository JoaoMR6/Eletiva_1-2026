<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    try{
      $stmt = $pdo->query("SELECT * FROM categoria");
      $resultado = $stmt->fetchAll();
    } catch(Exception $e){
      die("<div class='alert alert-danger mt-3'>Erro: ". $e->getMessage()."</div>");
    }
?>

<style>
    .btn-alucar {
        background: linear-gradient(90deg, #6f42c1, #0d6efd, #d63384);
        color: white;
        border: none;
    }
    .btn-alucar:hover { color: white; opacity: 0.9; }
</style>

<div class="card shadow-sm p-4 mt-3" style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-4 text-center">Novo Veículo na Frota 🐺</h2>
    <form method="post">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Marca</label>
                <input type="text" name="marca" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Modelo</label>
                <input type="text" name="modelo" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Placa</label>
                <input type="text" name="placa" class="form-control" placeholder="ABC-1234" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Ano</label>
                <input type="number" name="ano" class="form-control" required>
            </div>
        </div>
        <div class="mb-3">
              <label class="form-label fw-bold">Valor da Diária (R$)</label>
              <input type="text" name="valor" class="form-control" required>
        </div>
        <div class="mb-3">
              <label class="form-label fw-bold">Categoria</label>
              <select required name="categoria_id" class="form-select">
                <?php foreach($resultado as $r): ?>
                  <option value="<?= $r['id'] ?>"><?= $r['nome'] ?></option>
                <?php endforeach; ?>
              </select>
        </div>
        <button type="submit" class="btn btn-alucar w-100 fw-bold">Cadastrar Veículo</button>
    </form>
    
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $ano = $_POST['ano'];
        $valor = $_POST['valor'];
        $categoria_id = $_POST['categoria_id'];

        try{
          // Ajuste o INSERT conforme a nova estrutura da tabela produto
          $sql = 'INSERT INTO produto (marca, modelo, placa, ano, valor, categoria_id, status) VALUES (?, ?, ?, ?, ?, ?, "disponivel")';
          $stmt = $pdo->prepare($sql);
          if($stmt->execute([$marca, $modelo, $placa, $ano, $valor, $categoria_id])){
            echo "<div class='alert alert-success mt-3 fw-bold'>Veículo cadastrado na frota com sucesso!</div>";
          }
        } catch(Exception $e){
          echo "<div class='alert alert-danger mt-3'>Erro ao cadastrar: ".$e->getMessage()."</div>";
        }
      }
    ?>
</div>

<?php require_once('rodape.php'); ?>