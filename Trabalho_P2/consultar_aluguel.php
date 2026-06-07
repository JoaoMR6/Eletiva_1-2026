<?php
    require_once('cabecalho.php');
    require_once('conexao.php');

    try {
        // Busca os dados do aluguel com JOIN para exibir informações claras
        $stmt = $pdo->prepare('SELECT a.*, u.nome AS cliente, p.modelo AS carro 
                               FROM aluguel a 
                               INNER JOIN usuario u ON a.usuario_id = u.id 
                               INNER JOIN produto p ON a.produto_id = p.id 
                               WHERE a.id=?');
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e) {
        echo "<div class='alert alert-danger mt-3'>Erro! ".$e->getMessage()."</div>";
    }
?>

<div class="card shadow-sm p-4 mt-3" style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-4 text-center text-danger">Excluir Aluguel 🐺</h2>

    <div class="alert alert-warning text-center fw-bold">
        Atenção: Você está prestes a cancelar este aluguel. Esta ação é irreversível.
    </div>

    <form method="post">
        <ul class="list-group mb-4">
            <li class="list-group-item">
                <strong>ID Aluguel:</strong> <?= $resultado['id'] ?>
            </li>
            <li class="list-group-item">
                <strong>Cliente:</strong> <?= $resultado['cliente'] ?>
            </li>
            <li class="list-group-item">
                <strong>Veículo:</strong> <?= $resultado['carro'] ?>
            </li>
            <li class="list-group-item">
                <strong>Período:</strong> <?= date('d/m/Y', strtotime($resultado['data_inicio'])) ?> até <?= date('d/m/Y', strtotime($resultado['data_fim'])) ?>
            </li>
            <li class="list-group-item">
                <strong>Valor Total:</strong> R$ <?= number_format($resultado['valor_total'], 2, ',', '.') ?>
            </li>
        </ul>
        <button type="submit" class="btn btn-danger w-100 fw-bold fs-5 shadow-sm">Confirmar Exclusão</button>
    </form>
    
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            try{
                $sql = "DELETE FROM aluguel WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                if($stmt->execute([$id])){
                    // Redireciona de volta para a lista após excluir
                    header('Location: consultar_aluguel.php');
                    exit;
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