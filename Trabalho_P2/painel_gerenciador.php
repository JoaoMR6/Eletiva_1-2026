<?php

    require_once('cabecalho.php');
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

<div class="row justify-content-center mt-5">
    
    <div class="col-md-4 mb-3">
        <div class="card shadow p-4 h-100">
            <h4 class="text-center mb-3">Categorias</h4>
            <p class="text-center text-muted mb-4">Adicione, edite ou remova os grupos de veículos (Ex: Sedan, SUV, Hatch).</p>
            <a href="categorias.php" class="btn btn-alucar w-100 fw-bold mt-auto">Gerenciar Categorias</a>
        </div>
    </div>
    
    <div class="col-md-4 mb-3">
        <div class="card shadow p-4 h-100">
            <h4 class="text-center mb-3">Veículos</h4>
            <p class="text-center text-muted mb-4">Gerencie a frota de carros disponíveis, valores e disponibilidade.</p>
            <a href="produtos.php" class="btn btn-alucar w-100 fw-bold mt-auto">Gerenciar Veículos</a>
        </div>
    </div>


    <?php

    require_once('rodape.php');
    ?>

</div>

</div> </body>
</html>