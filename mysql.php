<?php
session_start();
require 'conexao-banco.php';

if(isset($_POST['excluir-produto']))
{
    $produto_id = mysqli_real_escape_string($conexao, $_POST['excluir-produto']);

    $query = "DELETE FROM produtos WHERE id='$produto_id' ";
    $query_run = mysqli_query($conexao, $query);

    if($query_run)
    {
        $_SESSION['mensagem'] = "Produto excluído com sucesso!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "Falha ao excluir. Tente novamente.";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['atualizar-produto']))
{
    $produto_id = mysqli_real_escape_string($conexao, $_POST['produto_id']);

    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $marca = mysqli_real_escape_string($conexao, $_POST['marca']);
    $estoque = mysqli_real_escape_string($conexao, $_POST['estoque']);
    $preco = mysqli_real_escape_string($conexao, $_POST['preco']);

    $query = "UPDATE produtos SET descricao='$descricao', marca='$marca', estoque='$estoque', preco='$preco' WHERE id='$produto_id' ";
    $query_run = mysqli_query($conexao, $query);

    if($query_run)
    {
        $_SESSION['mensagem'] = "Produto atualizado com sucesso!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Falha ao atualizar o produto. Tente novamente.";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['salvar-produto']))
{
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $marca = mysqli_real_escape_string($conexao, $_POST['marca']);
    $estoque = mysqli_real_escape_string($conexao, $_POST['estoque']);
    $preco = mysqli_real_escape_string($conexao, $_POST['preco']);

    $query = "INSERT INTO produtos (descricao, marca, estoque, preco) VALUES ('$descricao','$marca','$estoque','$preco')";

    $query_run = mysqli_query($conexao, $query);
    if($query_run)
    {
        $_SESSION['mensagem'] = "Produto cadastrado com sucesso!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['mensagem'] = "Falha ao cadastrar o produto. Tente novamente.";
        header("Location: index.php");
        exit(0);
    }
}

?>