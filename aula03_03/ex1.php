<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exemplo estruturas de controle e repetição</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Exemplo estruturas de controle e repetição</h1>
<form method="post">
<div class="mb-3">
              <label for="valor1" class="form-label">Informe um valor</label>
              <input type="text" id="valor1" name="valor1" class="form-control" required="">
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<?php 
    if ($_SERVER['REQUEST_METHOD' == "POST"]){
        $valor1 = $_POST["valor1"];
       /* if($valor1 == "+")
            echo "<p>Sinal de soma </p>";

        elseif($valor1 == "-"){
            echo "<p>Sinal de subtração </p>";
        }

        elseif($valor1 == "*")
            echo "<p>Sinal de multiplicação </p>";

        elseif($valor1 == "/"){
            echo "<p>Sinal de divisão </p>";
        }

        else{
            echo "<p>Sinal invalido </p>";
        }

    */

    switch ($valor1) {
        case '+':
            echo "<p>Sinal de Soma </p>";
            break;

        case '-':
            echo "<p>Sinal de subtração </p>";
             break;
        
        case '*':
            echo "<p>Sinal de Multiplicação </p>";
            break;
            
        case '/':
            echo "<p>Sinal de Divisão</p>";
            break;
        
        default:
            echo "<p>Sinal invalido </p>";
            break;
    }
}

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>