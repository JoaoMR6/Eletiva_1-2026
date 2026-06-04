<?php
    require_once('cabecalho.php');
    require_once('conexao.php');

    // Busca os dados atuais do usuário para preencher o formulário
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE id = ?");
    $stmt->execute([$_SESSION['usuario_id']]);
    $usuario = $stmt->fetch();
?>

<div class="card shadow p-4 mt-4" style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-4">Completar Cadastro 📝</h2>
    
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control" value="<?= $usuario['data_nascimento'] ?>" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" placeholder="000.000.000-00" value="<?= $usuario['cpf'] ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">CNPJ (se empresa)</label>
                <input type="text" name="cnpj" class="form-control" placeholder="00.000.000/0000-00" value="<?= $usuario['cnpj'] ?>">
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Atualizar Cadastro</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nascimento = $_POST['data_nascimento'];
        $cpf = $_POST['cpf'];
        $cnpj = $_POST['cnpj'];

        // Atualiza no banco
        $sql = "UPDATE usuario SET data_nascimento = ?, cpf = ?, cnpj = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute([$nascimento, $cpf, $cnpj, $_SESSION['usuario_id']])) {
            echo "<div class='alert alert-success mt-3'>Cadastro atualizado com sucesso! Agora você já pode alugar carros.</div>";
            echo "<script>setTimeout(() => { window.location.href='alugar_carro.php'; }, 2000);</script>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Erro ao atualizar.</div>";
        }
    }
    ?>
</div>

<?php require_once('rodape.php'); ?>