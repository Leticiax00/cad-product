<?php
//  rotas do index para os metodos 
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('/produtos/salvar', 'Produtos::salvar'); // caminho dos controllers para as funções dos controllers 

// rota post para /produtos/salvar, direcionando para o metodo salvar do controlador - produtos.php (envio de formularios)

$routes->get('/produtos/sucesso', 'Produtos::sucesso'); // puxa a função sucesso do controlador (produtos) para a mensagem de sucesso para produto cadastrado

$routes->post('/produtos_excluir/(:num)', 'Home::excluirProduto/$1'); //id do produto(:num)// método excluir produto, passando o valor para o argumento
#'Home::excluirProduto/$1'); 

#$routes->get('/produto/editar/', 'Home::editar/$1'));

$routes->get('/produto/editar/(:num)', 'Home::editar/$1');
// chama o método editar para editar um produto pelo ID.

$routes->get('/form', function () {
    return view('form'); // rota para retornar a view
});
