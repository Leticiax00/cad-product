<?php

namespace App\Controllers;

use App\Models\ProdutoModel;

class Produtos extends BaseController
{

    public function index()
    {
       //TEste de conexão com o banco de dados
        $model = new ProdutoModel();
        $produtos = $model->findAll();
       dd($produtos);
        //return view('produtos/index', ['produtos' => $produtos]);
    }

    public function salvar()
    {
        // dd("chegou no salvar");
        
        $model = new ProdutoModel();

        $dados = [
            'nome'       => $this->request->getPost('nome'),
            'preco'      => $this->request->getPost('preco'),
            'quantidade' => $this->request->getPost('quantidade'),
        ];

        $model->insert($dados);

        return redirect()->to('/Produtos/sucesso');
    }

    public function sucesso()
    {
        return 'Produto cadastrado com sucesso!';
    }
}
