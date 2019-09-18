
<form method="post" action="./?classe=Produto&acao=create">

    Código de Barras:<br>
    <input type="text" id="codigoBarras" name="codigoBarras"><br>
    <br>

    Nome:<br>
    <input type="text" id="nome" name="nome"><br>
    <br>

    Preço de compra:<br>
    <input type="text" id="precoCompra" name="precoCompra"><br>
    <br>

    Preço de venda:<br>
    <input type="text" id="precoVenda" name="precoVenda"><br>
    <br>

    Quantidade em estoque:<br>
    <input type="number" id="quantidadeEstoque" name="quantidadeEstoque"><br>
    <br>

    Volume:<br>
    <input type="text" id="volume" name="volume"><br>
    <br>

    Unidade de medida:<br>
    <input type="text" id="unidadeMedida" name="unidadeMedida"><br>
    <br>

    Categoria:<br>
    <select id="categoriaId" name="categoriaId">
        <option value=""> -- selecione a categoria -- </option>
        <?php foreach($categorias AS $categoria){ ?>
            <option value="<?=$categoria->id?>"> <?=$categoria->nome?> </option>
        <?php } ?>
    </select><br>
    <br>

    Fornecedor:<br>
    <select id="fornecedorId" name="fornecedorId">
        <option value=""> -- selecione a fornecedor -- </option>
        <?php foreach($fornecedores AS $fornecedor){ ?>
            <option value="<?=$fornecedor->id?>"> <?=$fornecedor->nome_fantasia?> </option>
        <?php } ?>
    </select><br>
    <br>

    <button type="submit">Salvar</button>

</form>








