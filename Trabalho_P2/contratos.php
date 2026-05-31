<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    
    try{
        // Mesma lógica de PDO que você já utiliza
        $stmt = $pdo->query('SELECT * FROM contrato');
        $resultado = $stmt->fetchAll();
    } catch(Exception $e){
        echo "<div class='alert alert-danger mt-3'>Erro: ".$e->getMessage()."</div>";
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

<div class="d-flex justify-content-between align-items-center mb-4 mt-3">
    <h2>Tipos de Contrato 🐺</h2>
    <a href="novo_contrato.php" class="btn btn-alucar fw-bold shadow-sm">Novo Registro</a>
</div>

<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover table-striped mb-0">
    <thead class="table-dark">
        <tr>
        <th>ID</th>
        <th>Tipo de Contrato</th>
        <th>Valor Base</th>
        <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td class="fw-bold"><?= ucfirst($r['tipo']) ?></td>
            <td class="text-success fw-bold">R$ <?= number_format($r['valor'], 2, ',', '.') ?></td>
            <td class="d-flex gap-2">
            <a href="alterar_contrato.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning fw-bold">Editar</a>
            <a href="consultar_contrato.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info fw-bold text-white">Consultar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>

<?php
    require_once('rodape.php');
?>