<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 8</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exercício 8</h1>
<form method="post">
<div class="mb-3">
              <label for="pri" class="form-label">Informe o Valor</label>
              <input type="number" id="pri" name="pri" class="form-control" required="">
            </div><div class="mb-3">
              
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $valor= $_POST["pri"];

        //faz o $i ficar com o mesmo valor que $valor
        $i= $valor;

        // printa o $i, e vai o diminuindo enquanto ele for maior ou igual a 1
        do {
            echo "$i";
            $i--;
        }
        while($i >= 1); 
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>