<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Jogadores de Truco</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
<h1>Jogadores de Truco</h1>
<h3>Data atual: <?php echo date("d/m/Y")?></h3>
<form method="post">
<div class="mb-3">
              <label for="user" class="form-label">Usuario</label>
              <input type="text" id="user" name="user" class="form-control" required="">
            </div><div class="mb-3">
              <label for="dt_nascimento" class="form-label">Data de nascimento</label>
              <input type="date" id="dt_nascimento" name="dt_nascimento" class="form-control" required="">
            </div><div class="mb-3">
              <label for="md_jogo" class="form-label">Modo de jogo</label>
              <select id="md_jogo" name="md_jogo" class="form-select" required="">
                <option value="1v1">1v1</option><option value="2v2">2v2</option><option value="3v3">3v3</option>
              </select>
            </div><div class="mb-3">
              <label for="quan_part" class="form-label">Quantidade de Partidas</label>
              <select id="quan_part" name="quan_part" class="form-select" required="">
                <option value="1">1</option><option value="3">3</option>
              </select>
            </div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>

