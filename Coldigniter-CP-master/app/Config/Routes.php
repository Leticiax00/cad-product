<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/produtos/salvar', 'Produtos::salvar');
$routes->get('/produtos/sucesso', 'Produtos::sucesso');
$routes->get('/formulario', function () {
    return view('formulario');
});
