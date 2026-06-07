<?php
    // 1. Inicializa a sessão antes de qualquer coisa
    session_start();
    
    require_once('cabecalho.php');
    require_once('conexao.php');

    // Verifica se o usuário está logado
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: index.php");
        exit();
    }

    // 2. Busca os dados atuais (garantindo que as colunas existam no seu banco)
    $stmt = $pdo->prepare("SELECT data_nascimento, cpf FROM usuario WHERE id = ?");
    $stmt->execute([$_SESSION['usuario_id']]);
    $usuario = $stmt->fetch();
    
    // Se o usuário não existir no banco, define campos vazios para evitar erro
    $data_nascimento = $usuario['data_nascimento'] ?? '';
    $cpf = $usuario['cpf'] ?? '';
?>

<div class="card shadow p-4 mt-4" style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-4">Completar Cadastro 📝</h2>
    
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control" value="<?= htmlspecialchars($data_nascimento) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" placeholder="000.000.000-00" value="<?= htmlspecialchars($cpf) ?>">
        </div>

        <button type="submit" class="btn btn-primary w-100">Atualizar Cadastro</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nascimento = $_POST['data_nascimento'];
        $cpf = $_POST['cpf'];

        // 3. SQL corrigido: Removido o campo cnpj que não existe mais na tabela
        $sql = "UPDATE usuario SET data_nascimento = ?, cpf = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute([$nascimento, $cpf, $_SESSION['usuario_id']])) {
            echo "<div class='alert alert-success mt-3'>Cadastro atualizado com sucesso!</div>";
            echo "<script>setTimeout(() => { window.location.href='alugar_carro.php'; }, 2000);</script>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Erro ao atualizar dados.</div>";
        }
    }
    ?>
</div>

<?php require_once('rodape.php'); ?>