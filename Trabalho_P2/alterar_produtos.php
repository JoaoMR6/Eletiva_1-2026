<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    $mensagem = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $categoria = $_POST['categoria'];
        $id = $_GET['id'];
        
        try{
          $sql = "UPDATE produto SET descricao = ?, valor = ?, categoria_id = ? WHERE id = ?";
          $stmt = $pdo->prepare($sql);
          if($stmt->execute([$descricao, $valor, $categoria, $id])){
            $mensagem = "<div class='alert alert-success mt-3 fw-bold'>Alteração realizada com sucesso!</div>";
          } else {
            $mensagem = "<div class='alert alert-danger mt-3 fw-bold'>Erro ao alterar! Tente novamente.</div>";
          }
        } catch(Exception $e){
          $mensagem = "<div class='alert alert-danger mt-3'>Erro: ".$e->getMessage()."</div>";
        }
      }
      
    try{
        $stmt = $pdo->prepare("SELECT * from produto WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch (Exception $e){
        echo "<div class='alert alert-danger mt-3'>Erro: ".$e->getMessage()."</div>";
    }
    
    try{
      $stmt = $pdo->query('SELECT * FROM categoria');
      $resultado2 = $stmt->fetchAll();
    } catch(Exception $e){
      die("<div class='alert alert-danger mt-3'>Erro: ".$e->getMessage()."</div>");
    }
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
    <h2 class="mb-4 text-center">Alterar Veículo 🐺</h2>
    <form method="post" action="alterar_produto.php?id=<?= $resultado['id']?>">
        <div class="mb-3">
            <label for="descricao" class="form-label fw-bold">Modelo do Veículo (Descrição)</label>
            <input value="<?= $resultado['descricao']?>" type="text" id="descricao" name="descricao" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label fw-bold">Valor da Diária (R$)</label>
            <input value="<?= $resultado['valor']?>" type="text" id="valor" name="valor" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label fw-bold">Selecione o Grupo (Categoria)</label>
            <select name="categoria" id="categoria" required class="form-select">
                <?php foreach($resultado2 as $r): 
                        if($resultado['categoria_id'] == $r['id'])
                          $selecionado = "selected";
                        else
                          $selecionado = "";  
                ?>
                  <option <?= $selecionado ?>  value="<?= $r['id']?>"><?= $r['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-alucar w-100 fw-bold">Salvar Alterações</button>
    </form>
    
    <?php echo $mensagem; ?>
</div>

<?php
    require_once('rodape.php');
?>