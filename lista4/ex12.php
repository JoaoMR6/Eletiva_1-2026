<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercicio 12</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exercicio 12</h1>
<form method="post">

<button type="submit" class="btn btn-primary">Gerar senha</button>
</form>
<?php 
     if($_SERVER['REQUEST_METHOD']== "POST"){
     $caracteres= array_merge(range('a','z'), range('A', 'Z'), range(0,9));
     $senha="";

     //fazer a senha
     for($i= 0; $i < 8; $i++){
        $senha .= $caracteres[random_int(0, count($caracteres) -1)];
     }

     echo "<h3>Valor Senha gerada: $senha </h3>";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>