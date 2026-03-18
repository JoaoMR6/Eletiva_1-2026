<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1></h1>
<form method="post">
<div class="mb-3">
              <label for="primeiro" class="form-label">1 valor</label>
              <input type="number" id="primeiro" name="primeiro" class="form-control" required="">
            </div><div class="mb-3">
              <label for="segundo" class="form-label">2 valor</label>
              <input type="number" id="segundo" name="segundo" class="form-control" required="">
            </div><div class="mb-3">
              <label for="terceiro" class="form-label">3 valor</label>
              <input type="number" id="terceiro" name="terceiro" class="form-control" required="">
            </div><div class="mb-3">
              <label for="quarto" class="form-label">4 valor</label>
              <input type="number" id="quarto" name="quarto" class="form-control" required="">
            </div><div class="mb-3">
              <label for="quinto" class="form-label">5 valor</label>
              <input type="number" id="quinto" name="quinto" class="form-control" required="">
            </div><div class="mb-3">
              <label for="sexto" class="form-label">6 valor</label>
              <input type="number" id="sexto" name="sexto" class="form-control" required="">
            </div><div class="mb-3">
              <label for="setimo" class="form-label">7 valor</label>
              <input type="number" id="setimo" name="setimo" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $valor1= $_POST["primeiro"];
        $valor2= $_POST["segundo"];
        $valor3= $_POST["terceiro"];
        $valor4= $_POST["quarto"];
        $valor5= $_POST["quinto"];
        $valor6= $_POST["sexto"];
        $valor7= $_POST["setimo"];

        $menorV= $valor1;
        $menorIn=1;

        if($valor2 < $menorV){
            $menorV = $valor2;
            $menorIn = 2;
        }

        if($valor3 < $menorV){
            $menorV = $valor3;
            $menorIn = 3;
        }

        if($valor4 < $menorV){
            $menorV = $valor4;
            $menorIn = 4;
        }

        if($valor5 < $menorV){
            $menorV = $valor5;
            $menorIn = 5;
        }

        if($valor6 < $menorV){
            $menorV = $valor6;
            $menorIn = 6;
        }

        if($valor7 < $menorV){
            $menorV = $valor7;
            $menorIn = 7;
        }

        
        echo " <p>Esse é o menor valor = $menorV </p>";
        echo "<p> E seu indice é: $menorIn </p>";
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>