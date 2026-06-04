<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    
    try{
        // O comando SQL permanece exatamente o mesmo que você enviou
        $stmt = $pdo->query('SELECT p.*, c.nome FROM produto p
                             INNER JOIN categoria c ON c.id = p.categoria_id');
        $resultado = $stmt->fetchAll();
    } catch(Exception $e){
        echo "<div class='alert alert-danger'>Erro: ".$e->getMessage()."</div>";
    }
?>

<style>
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

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Frota de Veículos 🐺</h2>
    <a href="novo_produto.php" class="btn btn-alucar fw-bold shadow-sm">Novo Registro</a>
</div>

<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover table-striped mb-0">
    <thead class="table-dark">
        <tr>
        <th>ID</th>
        <th>Veículo (Descrição)</th>
        <th>Grupo (Categoria)</th>
        <th>Valor da Diária</th>
        <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td class="fw-bold"><?= $r['descricao'] ?></td>
            <td><?= $r['nome'] ?></td>
            <td class="text-success fw-bold">R$ <?= number_format($r['valor'], 2, ',', '.') ?></td>
            <td class="d-flex gap-2">
                <a href="alterar_produto.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning fw-bold">Editar</a>
                <a href="consultar_produto.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info fw-bold text-white">Consultar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>

<?php
    require_once('rodape.php');
?>