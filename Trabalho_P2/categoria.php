<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    
    try{
        $stmt = $pdo->query('SELECT * FROM categoria');
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
    <h2>Grupos de Veículos (Categorias) 🐺</h2>
    <a href="nova_categoria.php" class="btn btn-alucar fw-bold shadow-sm">Novo Registro</a>
</div>

<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover table-striped mb-0">
    <thead class="table-dark">
        <tr>
        <th>ID</th>
        <th>Descrição (Nome do Grupo)</th>
        <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td class="fw-bold"><?= $r['nome'] ?></td>
            <td class="d-flex gap-2">
            <a href="alterar_categoria.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning fw-bold">Editar</a>
            <a href="consultar_categoria.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info fw-bold text-white">Consultar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>

<?php
    require_once('rodape.php');
?>