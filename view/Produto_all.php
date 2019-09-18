<?php //include 'inc/header.php'; ?>
<h2>Produtos</h2>

<?php
// se tem uma mensagem de erro mostra a mensagem e em seguida apaga
if( isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>



<br>
<br>

<table class="table">

    <tr>
        <th>Produto</th>
        <th>Categoria</th>
        <th>Fornecedor</th>
    </tr>


    <?php foreach($produtos AS $produto){ ?>

        <tr>

            <td><?=$produto->nome?></td>
            <td><?=$produto->categoria_nome?></td>
            <td><?=$produto->fornecedor_nome?></td>

        </tr>

    <?php } ?>

</table>

<?php //include 'inc/footer.php'; ?>




<script>
    $('#myModal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $("#btn-excluir").attr('href','?classe=Disciplina&acao=delete&id='+id);

    });
</script>
