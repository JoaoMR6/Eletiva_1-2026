<?php
    require_once('cabecalho.php');
    require_once('conexao.php');

    // Buscando dados para os selects
    $usuarios = $pdo->query("SELECT id, nome FROM usuario")->fetchAll();
    $produtos = $pdo->query("SELECT id, nome FROM produto")->fetchAll();
    $contratos = $pdo->query("SELECT id, tipo, valor FROM contrato")->fetchAll();
?>

<div class="card shadow-sm p-4 mt-3" style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-4 text-center">Registrar Novo Aluguel 🐺</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label fw-bold">Cliente</label>
            <select name="usuario_id" class="form-select" required>
                <?php foreach ($usuarios as $u) echo "<option value='{$u['id']}'>{$u['nome']}</option>"; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Veículo</label>
            <select name="produto_id" class="form-select" required>
                <?php foreach ($produtos as $p) echo "<option value='{$p['id']}'>{$p['nome']}</option>"; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Tipo de Contrato</label>
            <select name="contrato_id" class="form-select" required>
                <?php foreach ($contratos as $c) echo "<option value='{$c['id']}'>{$c['tipo']} (R$ {$c['valor']})</option>"; ?>
            </select>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Data Início</label>
                <input type="date" name="data_inicio" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Data Fim</label>
                <input type="date" name="data_fim" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100 fw-bold">Finalizar Aluguel</button>
    </form>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
    }
    require_once('rodape.php');
?>