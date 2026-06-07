<?php
    session_start();
    require_once('cabecalho_usuario.php');
    require_once('conexao.php');

    // Verifica se está logado
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: index.php');
        exit();
    }

    // Busca os aluguéis do usuário logado, incluindo o nome do veículo
    $sql = "SELECT a.*, p.modelo as veiculo_modelo, c.tipo as contrato_tipo 
            FROM aluguel a
            JOIN produto p ON a.produto_id = p.id
            JOIN contrato c ON a.contrato_id = c.id
            WHERE a.usuario_id = ? 
            ORDER BY a.data_inicio DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['usuario_id']]);
    $meus_alugueis = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <?php if (isset($_GET['sucesso'])): ?>
        <div class="alert alert-success">Aluguel realizado com sucesso!</div>
    <?php endif; ?>

    <h2>Olá, <?= htmlspecialchars($_SESSION['nome']) ?>! 👋</h2>
    <h4 class="mt-4">Meus Veículos Alugados</h4>

    <?php if (empty($meus_alugueis)): ?>
        <p>Você ainda não possui aluguéis ativos. <a href="alugar_carro.php">Alugar um agora?</a></p>
    <?php else: ?>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Veículo</th>
                    <th>Contrato</th>
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($meus_alugueis as $a): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($a['veiculo_modelo']) ?></strong></td>
                        <td><?= htmlspecialchars($a['contrato_tipo']) ?></td>
                        <td><?= date('d/m/Y', strtotime($a['data_inicio'])) ?></td>
                        <td><?= date('d/m/Y', strtotime($a['data_fim'])) ?></td>
                        <td>R$ <?= number_format($a['valor_total'], 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require_once('rodape.php'); ?>