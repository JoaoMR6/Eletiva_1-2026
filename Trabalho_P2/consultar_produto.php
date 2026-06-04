<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    try{
        $stmt = $pdo->prepare('SELECT p.*, c.nome FROM produto p 
                               INNER JOIN categoria c ON c.id = p.categoria_id 
                                WHERE p.id=?');
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "<div class='alert alert-danger mt-3'>Erro! ".$e->getMessage()."</div>";
    }
?>

<div class="card shadow-sm p-4 mt-3" style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-4 text-center text-danger">Excluir Veículo 🐺</h2>

    <div class="alert alert-warning text-center fw-bold">
        Atenção: Você está prestes a remover este veículo da frota.
    </div>

    <form method="post" action="consultar_produto.php?id=<?= $resultado['id'] ?>">
        <ul class="list-group mb-4">
            <li class="list-group-item">
                <strong>Modelo do Veículo:</strong> <?= $resultado['descricao'] ?>
            </li>
            <li class="list-group-item">
                <strong>Valor da Diária:</strong> R$ <?= number_format($resultado['valor'], 2, ',', '.') ?>
            </li>
            <li class="list-group-item">
                <strong>Grupo (Categoria):</strong> <?= $resultado['nome'] ?>
            </li>
        </ul>
        <button type="submit" class="btn btn-danger w-100 fw-bold fs-5 shadow-sm">Confirmar Exclusão</button>
    </form>
    
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            try{
                $sql = "DELETE FROM produto WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                if($stmt->execute([$id])){
                    header('Location: produtos.php');
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