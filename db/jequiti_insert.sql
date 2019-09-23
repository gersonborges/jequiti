INSERT INTO `categoria` (`nome`) VALUES
('Bebidas'),
('Enlatados'),
('Padaria');

INSERT INTO `fornecedor` (`cnpj`, `razao_social`, `nome_fantasia`) VALUES
('45997418000153', 'Coca Cola Industrias Ltda', 'Coca-Cola');


INSERT INTO `produto` (`codigo_barras`, `nome`, `preco_compra`, `preco_venda`, `quantidade_estoque`, `volume`, `unidade_medida`, `categoria_id`, `fornecedor_id`) VALUES
('7894900700046', 'Refrigerante Coca Cola Lata 350ml', 3.2, 4.5, 12, 335, 'ml', 1, 1),
('7894900011517', 'Refrigerante Coca Cola Pet 2l', 8.35, 11, 12, 2, 'litros', 1, 1);