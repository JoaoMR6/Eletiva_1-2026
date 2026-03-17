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
    <?php //exercicio 1 lista 3 mas com array
    for($i=0; $i<7; $i++)
        echo '<div class="mb-3">
              <label for="nota[]" class="form-label">Coloque o numero</label>
              <input type="number" id="nota[]" name="nota[]" class="form-control" required="">
            </div>' ; //use o colchetes no name, mas n use o for na div fica muito feio
    ?>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
  //exercicio 1 lista 3 mas com array
        if($_SERVER['REQUEST_METHOD']== "POST"){
            $mapa=$_POST['nota'];
            $copia_mapa = $mapa;
            sort($mapa); //achar o menor valor
            echo "<p> O menor valor é:". $mapa[0]. "</p>"; // ficou automaticamente na posição 0

            $posicao= array_search($mapa[0], $copia_mapa); //achar indice do menor valor
            echo"<p>Na posição $posicao </p>";

        }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>