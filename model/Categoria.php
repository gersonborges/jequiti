<?php

class Categoria
{

    private $id;
    private $nome;

    private $con;

    /**
     * Categoria constructor.
     * @param $id
     * @param $nome
     */
    public function __construct($id=NULL, $nome=NULL)
    {
        $this->id = $id;
        $this->nome = $nome;

        $this->con = new PDO(SERVIDOR, USUARIO, SENHA);
    }

    public function all(){
        $sql = $this->con->prepare('SELECT * FROM categoria ORDER BY nome');
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param null $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }




}
