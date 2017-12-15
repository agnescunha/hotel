<?php
require_once '../../controller/ServicoControle.php';
$controle = new ServicoControle();
$id=$_GET['id'];

if (isset($_POST['sim'])) {
    $controle->delete($_POST['id']);
    header("Location: index_servico.php");
}
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="modalLabel">Excluir Servico</h4>
</div>
<div class="modal-body">
    Deseja realmente excluir este serviço?
</div>
<div class="modal-footer">
    <form action="modal_servico.php" method="post">
        <?php echo"<input type=\"text\" name=\"id\" value=\"$id\" hidden>"; ?>
        <button type="submit" class="btn btn-primary" name="sim" >Sim</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
    </form>
</div>
