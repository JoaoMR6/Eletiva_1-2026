<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 2</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
<h1>exercicio 2</h1>
<form method="post">
<?php for($i = 0; $i < 5; $i++): ?>
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome[]" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">1 Nota</label>
        <input type="text" name="nota1[]" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">2 Nota</label>
        <input type="text" name="nota2[]" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">3 Nota</label>
        <input type="text" name="nota3[]" class="form-control" required>
        <p>-------------------------------------------------------------- </p>
    </div>
<?php endfor; ?>

<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $AlunosM= [];
        
        for($i= 0; $i<5; $i++){
            $nome= $_POST["nome"][$i];
            $nota1= $_POST["nota1"][$i];
            $nota2= $_POST["nota2"][$i];
            $nota3= $_POST["nota3"][$i];

            //calculo da media
            $media= ($nota1 + $nota2  + $nota3) /3;

            // adicionar no mapa
            $AlunosM[$nome]= $media;
            }

        //ordernar pela media do maior pro menor
        arsort($AlunosM);

        //exibir
        echo"<h2> Lista </h2>";
        

        foreach($AlunosM as $nome => $media){
                echo "<p>$nome -->" .number_format($media). "</p>";
            }
        
            
        }
    
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<div>

</body>
</html>