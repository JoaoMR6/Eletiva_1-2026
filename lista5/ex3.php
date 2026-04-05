<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 3</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
<h1>exercicio 3</h1>
<form method="post">
<?php for($i = 0; $i < 5; $i++): ?>
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome[]" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Codigo</label>
        <input type="text" name="codigo[]" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Preço</label>
        <input type="text" name="preco[]" class="form-control" required>
        <p>------------------------------------------------------------------------------------------------------------ </p>
    </div>
<?php endfor; ?>

<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $produtos= [];
        
        for($i= 0; $i<5; $i++){
            $nome= $_POST["nome"][$i];
            $cod= $_POST["codigo"][$i];
            $pre= $_POST["preco"][$i];

            //calculo do desconto
            //apenas SE o preço for maior que 100
            if($pre > 100){
                $pre= $pre * 0.9;
            }

            // adicionar no mapa
            $produtos[$cod]= [
                 "nome"=> $nome,
                 "pre"=> $pre];
            }

        //ordernar pelo codigo
        uasort($produtos, function($a, $b){
            return strcmp($a["nome"], $b["nome"]);
        });

        //exibir
        echo"<h2> Lista de Produtos </h2>";
        

        foreach($produtos as $nome => $dados){
                echo "<p>Codigo: $cod | Nome: {$dados["nome"]} | Preço: " . number_format($dados["pre"]). "</p>";
            }
        
            
        }
    
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<div>

</body>
</html>