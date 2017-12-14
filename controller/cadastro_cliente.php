<?php  
    require_once '../model/Cliente.php';
    require_once '../model/Banco.php';

    $cliente = new Cliente();
        $cliente->setNome($_POST['nome_cliente']);
        $cliente->setSexo($_POST['sexo']);
        $cliente->setEndereco($_POST['endereco_cliente']);
        $cliente->setTelefone1($_POST['telefone_cliente']);
        $cliente->setTelefone2($_POST['celular_cliente']);
        $cliente->setCpf($_POST['cpf_cliente']);
        $cliente->setRg($_POST['rg_cliente']);
        $cliente->setAniversario($_POST['nascimento_cliente']);
        $cliente->setEmail($_POST['email_cliente']);
        $cliente->setSenha($_POST['senha_cliente']);

    $banco = new Banco();

    if($banco->cadastrarCliente($cliente) == 1){
        header('location:../view/telas/login.php');
    }
?>