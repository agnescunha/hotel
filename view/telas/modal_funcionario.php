<?php
  require_once '../../controller/FuncionarioControle.php';
  $controle = new FuncionarioControle();
    $id=$_GET['id'];

    if (isset($_POST['sim'])) {
        $controle->delete($_POST['id']);
         header("Location: index_funcionario.php");
    }
?>

<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel">Excluir Funcionário</h4>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este funcionário?
      </div>
      <div class="modal-footer">
      <form action="modal_funcionario.php" method="post">
        <?php echo"<input type=\"text\" name=\"id\" value=\"$id\" hidden>"; ?>
        <button type="submit" class="btn btn-primary" name="sim" >Sim</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
     </form>
  </div>
