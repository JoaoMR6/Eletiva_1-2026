<?php
    session_start();
    require_once('cabecalho.php');
    require_once('conexao.php');

    // 1. Verificação de Segurança única e otimizada
    $stmt = $pdo->prepare("SELECT data_nascimento, cpf, cnpj FROM usuario WHERE id = ?");
    $stmt->execute([$_SESSION['usuario_id']]);
    $user = $stmt->fetch();

    // Redireciona para completar cadastro se faltar dados
    if (empty($user['data_nascimento']) || (empty($user['cpf']) && empty($user['cnpj']))) {
        header('Location: completar_cadastro.php');
        exit;
    }

    // Validação de idade (regra de negócio: > 21 anos)
    $idade = (new DateTime())->diff(new DateTime($user['data_nascimento']))->y;
    if ($idade <= 21) {
        echo "<div class='alert alert-warning mt-4 text-center'>Para alugar, você precisa ter mais de 21 anos.</div>";
        require_once('rodape.php');
        exit;
    }

    // 2. Busca dados para o formulário
    $produtos = $pdo->query("SELECT id, modelo FROM produto")->fetchAll(PDO::FETCH_ASSOC);
    $contratos = $pdo->query("SELECT id, tipo, valor FROM contrato")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card shadow p-4 mt-4" style="max-width: 600px; margin: 0 auto;">
    <h2 class="text-center mb-4">Alugar Veículo 🚗</h2>
    <form method="post" action="processar_aluguel.php">
        <input type="hidden" name="usuario_id" value="<?= $_SESSION['usuario_id'] ?>">
        
        <div class="mb-3">
            <label class="fw-bold">Selecione o Veículo</label>
            <select name="produto_id" class="form-select" required>
                <?php foreach ($produtos as $p): ?>
                    <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['modelo']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="fw-bold">Tipo de Contrato</label>
            <select name="contrato_id" class="form-select" required>
                <?php foreach ($contratos as $c): ?>
                    <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['tipo']) ?> - R$ <?= number_format($c['valor'], 2, ',', '.') ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="fw-bold">Data Início</label>
                <input type="date" name="data_inicio" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-bold">Data Fim</label>
                <input type="date" name="data_fim" class="form-control" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-4 fw-bold">Confirmar Locação</button>
    </form>
</div>

<?php require_once('rodape.php'); ?>