<?php
    require_once '../model/Cliente.php';
    require_once '../model/Banco.php';

    var_dump($_POST);

    if(isset($_POST['Button_atualizar'])){
        $cliente1 = new Cliente();
        //não atualizavel
        $cliente1->setNome($_POST['nome_cliente']);
        $cliente1->setSexo($_POST['sexo_cliente']);
        $cliente1->setCpf($_POST['cpf_cliente']);
        $cliente1->setRg($_POST['rg_cliente']);
        $cliente1->setAniversario($_POST['nascimento_cliente']);
        $cliente1->setEmail($_POST['email_cliente']);
        //atualizavel
        $cliente1->setEndereco($_POST["endereco_cliente"]);
        $cliente1->setTelefone1($_POST["telefone_cliente"]);
        $cliente1->setTelefone2($_POST["celular_cliente"]);
        $cliente1->setSenha($_POST["senha_cliente"]);

        var_dump($cliente1);
        echo "<br>";
        $banco = new Banco();
        $banco->atualizarCliente($cliente1);
        header('Location: ../view/telas/area_cliente.php');
        echo"<script>alert('Dados cadastrados com sucesso!');</script>";
    }
?>