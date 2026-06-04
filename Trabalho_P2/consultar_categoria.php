<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    try{
        $stmt = $pdo->prepare('SELECT * FROM categoria WHERE id=?');
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "<div class='alert alert-danger mt-3'>Erro! ".$e->getMessage()."</div>";
    }
?>

<div class="card shadow-sm p-4 mt-3" style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-4 text-center text-danger">Excluir Grupo de Veículos 🐺</h2>
    
    <div class="alert alert-warning text-center fw-bold">
        Atenção: Esta ação não poderá ser desfeita.
    </div>

    <form method="post" action="consultar_categoria.php?id=<?= $resultado['id'] ?>">
        <div class="mb-4 text-center">
              <p class="fs-5"><strong>Nome do Grupo:</strong> <br>
                 <span class="fs-4"><?= $resultado['nome'] ?></span>
              </p>
        </div>
        <button type="submit" class="btn btn-danger w-100 fw-bold fs-5 shadow-sm">Confirmar Exclusão</button>
    </form>
    
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            try{
                $sql = "DELETE FROM categoria WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                if($stmt->execute([$id])){
                    header('Location: categorias.php');
                } else {
                    echo "<div class='alert alert-danger mt-3 fw-bold'>Erro ao excluir!</div>";
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