<?php
    require_once('cabecalho.php');
    require_once('conexao.php');

    $alugueis = []; 

    try {
        $sql = "SELECT a.*, u.nome as cliente, p.modelo as veiculo, c.tipo as contrato 
                FROM aluguel a
                JOIN usuario u ON a.usuario_id = u.id
                JOIN produto p ON a.produto_id = p.id
                JOIN contrato c ON a.contrato_id = c.id
                ORDER BY a.data_inicio DESC";
        
        $stmt = $pdo->query($sql);
        $alugueis = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch(Exception $e) {
        echo "<div class='alert alert-danger'>Erro ao listar: " . $e->getMessage() . "</div>";
    }
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Listagem de Aluguéis 🐺</h2>
        <a href="novo_aluguel.php" class="btn btn-primary fw-bold">+ Novo Aluguel</a>
    </div>

    <table class="table table-striped shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>Cliente</th>
                <th>Veículo</th>
                <th>Contrato</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Valor Total</th>
                <th>Ações</th> </tr>
        </thead>
        <tbody>
            <?php if (count($alugueis) > 0): ?>
                <?php foreach ($alugueis as $a): ?>
                <tr>
                    <td><?= htmlspecialchars($a['cliente']) ?></td>
                    <td><?= htmlspecialchars($a['veiculo']) ?></td>
                    <td><?= ucfirst(htmlspecialchars($a['contrato'])) ?></td>
                    <td><?= date('d/m/Y', strtotime($a['data_inicio'])) ?></td>
                    <td><?= date('d/m/Y', strtotime($a['data_fim'])) ?></td>
                    <td class="fw-bold">R$ <?= number_format($a['valor_total'], 2, ',', '.') ?></td>
                    <td class="d-flex gap-2">
                        <a href="consultar_aluguel.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-info text-white">Consultar</a>
                        <a href="excluir_aluguel.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente cancelar este aluguel?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Nenhum aluguel encontrado no sistema.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once('rodape.php'); ?>