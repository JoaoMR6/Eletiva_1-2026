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
              <label for="valor" class="form-label">Capital</label>
              <input type="number" id="valor" name="valor" class="form-control" required="">
            </div><div class="mb-3">
              <label for="juros" class="form-label">Taxa de números</label>
              <input type="number" id="juros" name="juros" class="form-control" required="">
            </div><div class="mb-3">
              <label for="periodo" class="form-label">Periodo</label>
              <input type="number" id="periodo" name="periodo" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
    if($_SERVER['REQUEST_METHOD'] =="POST"){
        $valor=$_POST['valor'];
        $juros= $_POST['juros'];
        $periodo= $_POST['periodo'];

        $jurosF= ($juros * 0.01) * $valor;
        $resul= $valor * $jurosF * $periodo;
        
        echo "Resultado = $resul";
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>