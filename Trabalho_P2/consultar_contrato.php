<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    try{
        $stmt = $pdo->prepare('SELECT * FROM contrato WHERE id=?');
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "<div class='alert alert-danger mt-3'>Erro! ".$e->getMessage()."</div>";
    }
?>

<div class="card shadow-sm p-4 mt-3" style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-4 text-center text-danger">Excluir Contrato 🐺</h2>

    <div class="alert alert-warning text-center fw-bold">
        Atenção: Você está prestes a remover este tipo de contrato do sistema.
    </div>

    <form method="post" action="consultar_contrato.php?id=<?= $resultado['id'] ?>">
        <ul class="list-group mb-4">
            <li class="list-group-item">
                <strong>Tipo de Contrato:</strong> <?= ucfirst($resultado['tipo']) ?>
            </li>
            <li class="list-group-item">
                <strong>Valor Base:</strong> R$ <?= number_format($resultado['valor'], 2, ',', '.') ?>
            </li>
        </ul>
        <button type="submit" class="btn btn-danger w-100 fw-bold fs-5 shadow-sm">Confirmar Exclusão</button>
    </form>
    
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            try{
                $sql = "DELETE FROM contrato WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                if($stmt->execute([$id])){
                    header('Location: contratos.php');
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