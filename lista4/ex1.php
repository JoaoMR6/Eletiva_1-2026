<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício Contatos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container py-3">
<h1>exercicio 1</h1>
<form method="post">
<?php for($i = 0; $i < 5; $i++): ?>
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome[]" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone[]" class="form-control" required>
    </div>
<?php endfor; ?>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php  
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $contatos= [];
        
        for($i= 0; $i<5; $i++){
            $nome= $_POST["nome"][$i];
            $telefone= $_POST["telefone"][$i];

            // adicionar no contatos
            $contatos[$nome]= $telefone;
            }

        //ordernar por nome
        ksort($contatos);

        //exibir contatos
        

        foreach($contatos as $nome => $telefone){
                echo "<p>$nome --> $telefone </p>";
            }
        
            
        }
    
?>
