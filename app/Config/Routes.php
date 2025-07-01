<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
<<<<<<< HEAD
$routes->post('/produtos/salvar', 'Produtos::salvar');
$routes->get('/produtos/sucesso', 'Produtos::sucesso');
$routes->get('/formulario', function () {
    return view('formulario');
});
=======
>>>>>>> 0fbb1240742f9631663e59b26352332ca6e5d831
