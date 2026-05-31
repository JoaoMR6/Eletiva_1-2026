<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    $mensagem = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['descricao'];
        $id = $_GET['id'];
        try{
          $sql = "UPDATE categoria SET nome = ? WHERE id = ?";
          $stmt = $pdo->prepare($sql);
          if($stmt->execute([$nome, $id])){
            $mensagem = "<div class='alert alert-success mt-3 fw-bold'>Alteração realizada com sucesso!</div>";
          } else {
            $mensagem = "<div class='alert alert-danger mt-3 fw-bold'>Erro ao alterar! Tente novamente.</div>";
          }
        } catch(Exception $e){
          $mensagem = "<div class='alert alert-danger mt-3'>Erro: ".$e->getMessage()."</div>";
        }
      }
      
    try{
        $stmt = $pdo->prepare("SELECT * from categoria WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch (Exception $e){
        echo "<div class='alert alert-danger mt-3'>Erro: ".$e->getMessage()."</div>";
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
    <h2 class="mb-4 text-center">Alterar Grupo de Veículos 🐺</h2>
    <form method="post" action="alterar_categoria.php?id=<?= $resultado['id']?>">
        <div class="mb-3">
            <label for="descricao" class="form-label fw-bold">Nome do Grupo (Descrição)</label>
            <input value="<?= $resultado['nome']?>" type="text" id="descricao" name="descricao" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-alucar w-100 fw-bold">Salvar Alterações</button>
    </form>
    
    <?php echo $mensagem; ?>
</div>

<?php
    require_once('rodape.php');
?>