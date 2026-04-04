<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 14</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exercício 14</h1>
<form method="post">
<div class="mb-3">
              <label for="pri" class="form-label">Informe sua palavra</label>
              <input type="text" id="pri" name="pri" class="form-control" required="">
            </div><div class="mb-3">
              
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $palavra= $_POST["pri"];

        //faz a palavra invertidaa
        $resul= strrev($palavra);

        //ve se ambas palavras são iguais
        if($palavra == $resul){
            echo"<h3>São iguais: $palavra e $resul </h3>";
        }

        else{
            echo"<h3>São diferentes: $palavra e $resul </h3>";
        }
           
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>