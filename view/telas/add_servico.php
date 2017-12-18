<?php
require_once '../../model/Funcionario.php';
require_once '../../controller/ServicoControle.php';
session_start();
if($_SESSION['logado'] == TRUE){
    if ($_SESSION['funcionario']->getEhAdmin() == 1) {
        include 'menu_admin.html';
    }else{
        include 'menu_func.html';
    }
}else{
    header("Location: login_restrito.php");
}
$controle = new ServicoControle();
if (isset($_POST['salvar'])) {
    $descricao=$_POST['descricao'];
    $valor = $_POST['valor'];

    if (empty($descricao) || empty($valor)){
        echo "<script type=\"text/javascript\">alert(\"Campo obrigatorio em branco!\") </script>";
    }else{
        if (($controle->verificarDescricao($descricao) > 0) || ($controle->verificarValor($valor) > 0)) {
            if ($controle->verificarDescricao($descricao) > 0) {
                echo "<script type=\"text/javascript\">alert(\"Descricao Necessaria!\") </script>";
            }
            if ($controle->verificarValor($valor) > 0) {
                echo "<script type=\"text/javascript\">alert(\"Valor cadastrado!\") </script>";
            }
        }else{
            $servico = new Servico($descricao,$valor);
            $controle->insert($servico);
            header("Location: index_restrito.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador</title>

    <link href="../vendor/bootstrap/css2/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/bootstrap/css2/style.css" rel="stylesheet">
</head>
<body>

<div id="main" class="container-fluid" style="margin-top: 50px">

    <h3 class="page-header">Cadastrar Servico</h3>

    <form action="add_servico.php" method="post">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Descricao*</label>
                <input type="text" class="form-control" name="nome" placeholder="Digite o valor">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Valor*</label>
                <input type="text" class="form-control" name="rg" placeholder="Digite o valor">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
                <a href="index_restrito.php" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>
</div>


<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
