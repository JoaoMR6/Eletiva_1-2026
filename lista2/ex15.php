<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercicio 15</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exercicio 15</h1>
<form method="post">
<div class="mb-3">
              <label for="pri_numero" class="form-label" step="any" >Peso (KG)</label>
              <input type="number" id="pri_numero" name="pri_numero" class="form-control" required="" step="0.01">
            </div><div class="mb-3">
              <label for="seg_numero" class="form-label" step= "any">Altura (Metros)</label>
              <input type="number" id="seg_numero" name="seg_numero" class="form-control" required="" step="0.01" >
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php
    if($_SERVER['REQUEST_METHOD'] =="POST"){
        $peso=$_POST['pri_numero'];
        $altu= $_POST['seg_numero'];
        $resul= $peso / ( $altu ** 2) ;
        echo "IMC = $resul";
    }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>