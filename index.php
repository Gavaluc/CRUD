<?php
    session_start();
    require 'conexao-banco.php';
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Produto CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('mensagem.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Produtos Cadastrados
                            <a href="cadastro-produto.php" class="btn btn-primary float-end">Adicionar Produto</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descrição</th>
                                    <th>Marca</th>
                                    <th>Estoque</th>
                                    <th>Preço(R$)</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM produtos";
                                    $query_run = mysqli_query($conexao, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $dados)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $dados['id']; ?></td>
                                                <td><?= $dados['descricao']; ?></td>
                                                <td><?= $dados['marca']; ?></td>
                                                <td><?= $dados['estoque']; ?></td>
                                                <td><?= $dados['preco']; ?></td>
                                                <td>
                                                    <a href="visualizar-produto.php?id=<?= $dados['id']; ?>" class="btn btn-info btn-sm">Visualizar</a>
                                                    <a href="editar-produto.php?id=<?= $dados['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <form action="mysql.php" method="POST" class="d-inline">
                                                        <button type="submit" name="excluir-produto" value="<?=$dados['id']; ?>" class="btn btn-danger btn-sm">Excluir</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Sem resultados. </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>