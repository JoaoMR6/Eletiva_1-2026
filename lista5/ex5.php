<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 5</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
<h1>exercicio 5</h1>
<form method="post">
<?php for($i = 0; $i < 5; $i++): ?>
    <div class="mb-3">
        <label class="form-label">Nome do livro</label>
        <input type="text" name="nome[]" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Quantidade</label>
        <input type="text" name="qtd[]" class="form-control" required>
        <p>------------------------------------------------------------------------------------------------------------ </p>
    </div>
<?php endfor; ?>

<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $livros= [];
        
        for($i= 0; $i<5; $i++){
            $nome= $_POST["nome"][$i];
            $qtd= $_POST["qtd"][$i];

            

            // adicionar no mapa
            $livros[$nome]= [
                 "qtd"=> $qtd];
            }

        //ordernar pelo nome
        arsort($livros, function($a){
            return strcmp($a["nome"]);
        });

        //exibir
        echo"<h2> Lista de Produtos </h2>";
        

        foreach($livros as $nome => $dados){
            if($dados["qtd"] > 5){
                echo "| Nome: {$dados["nome"]} | Preço: " . number_format($dados["qtd"]). "</p>";}

            else{
                echo "<h3> ALERTA: ESTOQUE COM POUCA QUANTIDADE</h3>";
                echo "| Nome: {$dados["nome"]} | Preço: " . number_format($dados["qtd"]). "</p>";
            }
            }
        
            
        }
    
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<div>

</body>
</html>