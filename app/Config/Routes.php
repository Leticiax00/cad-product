<?php
//  rotas do index para os metodos 
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('/Produtos/salvar', 'Produtos::salvar'); // caminho dos controllers para as funções dos controllers 

// rota post para /produtos/salvar, direcionando para o metodo salvar do controlador - produtos.php (envio de formularios)

<<<<<<< HEAD
$routes->get('/produtos/sucesso', 'Produtos::sucesso'); // puxa a função sucesso do controlador (produtos) para a mensagem de sucesso para produto cadastrado
=======
$routes->get('/Produtos/sucesso', 'Produtos::sucesso'); // puxa a função sucesso do controlador (produtos) para a mensagem de sucesso para produto cadastrado
>>>>>>> 91cbd332dac6fe3092e6d972ae90f5a8efd5849c

$routes->post('/produto_excluir/(:num)', 'Home::excluirProduto/$1'); //id do produto(:num)// método excluir produto, passando o valor para o argumento
#'Home::excluirProduto/$1'); 

#$routes->get('/produto/editar/', 'Home::editar/$1'));

<<<<<<< HEAD
$routes->get('/produto/editar/(:num)', 'Home::editar/$1');
=======
$routes->get('/Produto/editar/(:num)', 'Home::editar/$1');
>>>>>>> 91cbd332dac6fe3092e6d972ae90f5a8efd5849c
// chama o método editar para editar um produto pelo ID.

$routes->get('/form', function () {
    return view('form'); // rota para retornar a view
});
