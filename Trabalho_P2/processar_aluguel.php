<?php
    require_once('conexao.php');
    
    // Inicia a sessão para pegar o usuário logado
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario_id = $_SESSION['usuario_id'];
        $produto_id = $_POST['produto_id'];
        $contrato_id = $_POST['contrato_id'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];

        try {
            // 1. Calcular o valor total (buscando o valor diário do contrato selecionado)
            $stmt = $pdo->prepare("SELECT valor FROM contrato WHERE id = ?");
            $stmt->execute([$contrato_id]);
            $contrato = $stmt->fetch();
            $valor_diario = $contrato['valor'];

            // Calcular a diferença de dias
            $inicio = new DateTime($data_inicio);
            $fim = new DateTime($data_fim);
            $diferenca = $inicio->diff($fim)->days;
            $valor_total = $diferenca * $valor_diario;

            // 2. Gravar o aluguel no banco
            $sql = "INSERT INTO aluguel (usuario_id, produto_id, contrato_id, data_inicio, data_fim, valor_total) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$usuario_id, $produto_id, $contrato_id, $data_inicio, $data_fim, $valor_total]);

            // 3. Redirecionar para o painel com mensagem de sucesso
            header('Location: painel_usuario.php?sucesso=1');
            exit();

        } catch (Exception $e) {
            die("Erro ao processar aluguel: " . $e->getMessage());
        }
    } else {
        header('Location: alugar_carro.php');
    }
?>