<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro Produto</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('mensagem.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Novo Produto 
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="mysql.php" method="POST">

                            <div class="mb-3">
                                <label>Descrição</label>
                                <input type="text" name="descricao" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Marca</label>
                                <input type="text" name="marca" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Estoque</label>
                                <input type="number" name="estoque" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Preço(R$)</label>
                                <input type="price" name="preco" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="salvar-produto" class="btn btn-primary">Salvar Produto</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>