INSERT INTO `categoria` (`id`, `nome`) VALUES
(NULL, 'Bebidas');

INSERT INTO `fornecedor` (`id`, `cnpj`, `razao_social`, `nome_fantasia`) VALUES
(NULL, '45997418000153', 'Coca Cola Industrias Ltda', 'Coca-Cola');

INSERT INTO `produto` (`id`, `codigo_barras`, `nome`, `preco_compra`, `preco_venda`, `quantidade_estoque`, `volume`, `unidade_medida`, `categoria_id`, `fornecedor_id`) VALUES
(NULL, '7894900700046', 'Refrigerante Coca Cola Lata 350ml', 3.2, 4.5, 12, 335, 'ml', 1, 1),
(NULL, '7894900011517', 'Refrigerante Coca Cola Pet 2l', 8.35, 11, 12, 2, 'litros', 1, 1);
