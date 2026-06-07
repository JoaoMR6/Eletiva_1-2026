<?php
    require_once('cabecalho.php');
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
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

<div class="row text-center mt-4">
    <div class="col-12">
        <h2>Bem-vindo(a) ao Painel Gerenciador, <?php echo $_SESSION['nome']; ?>! 🐺</h2>
        <p class="lead mt-2">O que você deseja gerenciar na frota da ALucar hoje?</p>
    </div>
</div>

<div class="row justify-content-center mt-4">
    
    <div class="col-md-3 mb-3">
        <div class="card shadow p-4 h-100">
            <h4 class="text-center mb-3">Categorias</h4>
            <p class="text-center text-muted mb-4 small">Gerencie grupos de veículos (Sedan, SUV, etc).</p>
            <a href="categoria.php" class="btn btn-alucar w-100 fw-bold mt-auto">Gerenciar</a>
        </div>
    </div>
    
    <div class="col-md-3 mb-3">
        <div class="card shadow p-4 h-100">
            <h4 class="text-center mb-3">Veículos</h4>
            <p class="text-center text-muted mb-4 small">Gerencie a frota de carros disponíveis.</p>
            <a href="produto.php" class="btn btn-alucar w-100 fw-bold mt-auto">Gerenciar</a>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow p-4 h-100">
            <h4 class="text-center mb-3">Contratos</h4>
            <p class="text-center text-muted mb-4 small">Defina valores para diária, semanal ou mensal.</p>
            <a href="contratos.php" class="btn btn-alucar w-100 fw-bold mt-auto">Gerenciar</a>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow p-4 h-100">
            <h4 class="text-center mb-3">Aluguéis</h4>
            <p class="text-center text-muted mb-4 small">Registre e consulte aluguéis realizados.</p>
            <a href="aluguel.php" class="btn btn-alucar w-100 fw-bold mt-auto">Gerenciar</a>
        </div>
    </div>

</div>

<?php
    require_once('rodape.php');
?>