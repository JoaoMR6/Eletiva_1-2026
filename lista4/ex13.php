<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 13</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exercício 13</h1>
<form method="post">
<div class="mb-3">
              <label for="pri" class="form-label">Informe sua frase</label>
              <input type="text" id="pri" name="pri" class="form-control" required="">
            </div><div class="mb-3">
              
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $frase= $_POST["pri"];

        //separar as palavras
        $palavrasSepa=preg_split('/\s+/', trim($frase));
        
        //contar as palavras
        $resulPalavras= count($palavrasSepa);
        echo "<h3>Resultado da quantidade de palavras: $resulPalavras</h3>";

        //maior palavra
        $maior="";
        foreach($palavrasSepa as $p){
            if(strlen($p)> strlen($maior)){
                $maior= $p;
            }}
        echo"<h3>Maior palavra= $maior</h3>";
           
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>