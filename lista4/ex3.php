<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 3</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exercício 3</h1>
<form method="post">
<div class="mb-3">
            <label for="pri" class="form-label">Informe sua palavra</label>
              <input type="text" id="pri" name="pri" class="form-control" required="">
            </div><div class="mb-3">

            <label for="seg" class="form-label">Informe a 2 palavra</label>
              <input type="text" id="seg" name="seg" class="form-control" required="">
            </div><div class="mb-3">
              
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $palavra1= $_POST["pri"];
        $palavra2= $_POST["seg"];

        // SE a 2 palavra estiver dentro do 1 ela ira aparecer na tela (exemplo 1P=computador || 2P=dor)
        if(strpos($palavra1, $palavra2) !== false){
            echo"<h3>$palavra2 está contida na $palavra1 </h3>";
        }

        // SE não estiver contida (exemplo 1P=computador || 2P= vida)
        else{
            echo"<h3>$palavra2 NÃO está contida na $palavra1 </h3>";
        }

       
    
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>