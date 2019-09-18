<?php
require_once 'inc/config.php';
require_once 'model/Categoria.php';
require_once 'model/Fornecedor.php';
require_once 'model/Produto.php';

class ProdutoController
{

    public function all(){
        $obj = new Produto();
        $produtos = $obj->all();
        include "view/Produto_all.php";
    }

    public function create(){

        $obj = new Fornecedor();
        $fornecedores = $obj->all();

        $obj = new Categoria();
        $categorias = $obj->all();

        $obj = new Produto();

        if( isset($_POST['nome']) ){

            $obj->setCodigoBarras($_POST['codigoBarras']);
            $obj->setNome($_POST['nome']);
            $obj->setPrecoCompra($_POST['precoCompra']);
            $obj->setPrecoVenda($_POST['precoVenda']);
            $obj->setQuantidadeEstoque($_POST['quantidadeEstoque']);
            $obj->setVolume($_POST['volume']);
            $obj->setUnidadeMedida($_POST['unidadeMedida']);
            $obj->setCategoriaId($_POST['categoriaId']);
            $obj->setFornecedorId($_POST['fornecedorId']);


 //           $obj->create();

        }

        require_once 'view/Produto_create.php';

    }
}

