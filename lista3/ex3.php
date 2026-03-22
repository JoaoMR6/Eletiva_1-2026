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


            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $valor1= $_POST["primeiro"];
        $valor2= $_POST["segundo"];


        $menorV= $valor1;
        $maiorV= $valor1;

        if($valor1 == $valor2){
            echo"<p>Não colocar o mesmo valor duas vezes </p> ";
        }
        
        else{
            if ($valor2 < $menorV){
                $menorV = $valor2;
            }

            if($valor2 > $maiorV){
             $maiorV = $valor2;
            }


        echo " <p>$menorV - $maiorV </p>";}

    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html