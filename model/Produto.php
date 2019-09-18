<?php

class Produto
{
    private $id;
    private $codigoBarras;
    private $nome;
    private $precoCompra;
    private $precoVenda;
    private $quantidadeEstoque;
    private $volume;
    private $unidadeMedida;
    private $categoriaId;
    private $fornecedorId;

    private $con;

    /**
     * Produto constructor.
     * @param $id
     * @param $codigoBarras
     * @param $nome
     * @param $precoCompra
     * @param $precoVenda
     * @param $quantidadeEstoque
     * @param $volume
     * @param $unidadeMedida
     * @param $categoriaId
     * @param $fornecedorId
     */
    public function __construct($id=NULL, $codigoBarras=NULL, $nome=NULL, $precoCompra=NULL, $precoVenda=NULL, $quantidadeEstoque=NULL, $volume=NULL, $unidadeMedida=NULL, $categoriaId=NULL, $fornecedorId=NULL)
    {
        $this->id = $id;
        $this->codigoBarras = $codigoBarras;
        $this->nome = $nome;
        $this->precoCompra = $precoCompra;
        $this->precoVenda = $precoVenda;
        $this->quantidadeEstoque = $quantidadeEstoque;
        $this->volume = $volume;
        $this->unidadeMedida = $unidadeMedida;
        $this->categoriaId = $categoriaId;
        $this->fornecedorId = $fornecedorId;

        $this->con = new PDO(SERVIDOR, USUARIO, SENHA);
    }

    public function all(){

        $sql = $this->con->prepare("SELECT * FROM ver_produto");
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);

        return $rows;

    }

    public function create(){

        $sql = $this->con->prepare("INSERT INTO `produto`( `codigo_barras`, `nome`, `preco_compra`, `preco_venda`, `quantidade_estoque`, `volume`, `unidade_medida`, `categoria_id`, `fornecedor_id`) VALUES
        (?,?,?,?,?,?,?,?,?)");
        $sql->execute([
            $this->codigoBarras,
            $this->nome,
            $this->precoCompra,
            $this->precoVenda,
            $this->quantidadeEstoque,
            $this->volume,
            $this->unidadeMedida,
            $this->categoriaId,
            $this->fornecedorId
        ]);

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCodigoBarras()
    {
        return $this->codigoBarras;
    }

    /**
     * @param mixed $codigoBarras
     */
    public function setCodigoBarras($codigoBarras)
    {
        $this->codigoBarras = $codigoBarras;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getPrecoCompra()
    {
        return $this->precoCompra;
    }

    /**
     * @param mixed $precoCompra
     */
    public function setPrecoCompra($precoCompra)
    {
        $this->precoCompra = $precoCompra;
    }

    /**
     * @return mixed
     */
    public function getPrecoVenda()
    {
        return $this->precoVenda;
    }

    /**
     * @param mixed $precoVenda
     */
    public function setPrecoVenda($precoVenda)
    {
        $this->precoVenda = $precoVenda;
    }

    /**
     * @return mixed
     */
    public function getQuantidadeEstoque()
    {
        return $this->quantidadeEstoque;
    }

    /**
     * @param mixed $quantidadeEstoque
     */
    public function setQuantidadeEstoque($quantidadeEstoque)
    {
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    /**
     * @return mixed
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param mixed $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    /**
     * @return mixed
     */
    public function getUnidadeMedida()
    {
        return $this->unidadeMedida;
    }

    /**
     * @param mixed $unidadeMedida
     */
    public function setUnidadeMedida($unidadeMedida)
    {
        $this->unidadeMedida = $unidadeMedida;
    }

    /**
     * @return mixed
     */
    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

    /**
     * @param mixed $categoriaId
     */
    public function setCategoriaId($categoriaId)
    {
        $this->categoriaId = $categoriaId;
    }

    /**
     * @return mixed
     */
    public function getFornecedorId()
    {
        return $this->fornecedorId;
    }

    /**
     * @param mixed $fornecedorId
     */
    public function setFornecedorId($fornecedorId)
    {
        $this->fornecedorId = $fornecedorId;
    }



}
