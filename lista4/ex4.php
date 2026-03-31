<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 4</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exercício 4</h1>
<form method="post">
<div class="mb-3">
            <label for="pri" class="form-label">Informe o dia</label>
              <input type="text" id="pri" name="pri" class="form-control" required="">
            </div><div class="mb-3">

            <label for="seg" class="form-label">Informe o mes</label>
              <input type="text" id="seg" name="seg" class="form-control" required="">
            </div><div class="mb-3">
            
            <label for="ter" class="form-label">Informe o ano</label>
              <input type="text" id="ter" name="ter" class="form-control" required="">
            </div><div class="mb-3">
              
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $dia= $_POST["pri"];
        $mes= $_POST["seg"];
        $ano= $_POST["ter"];

        if(checkdate($mes, $dia, $ano)){
            $data=sprintf("%02d/%02d/%04d", $dia, $mes, $ano);
            echo"<h3>Data valida= $data </h3>";
            }
        
        else{
            echo "<h3>Data INVALIDA </h3>";
        }
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>