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
<<<<<<< HEAD
        // dd("chegou no salvar");
=======
        dd("chegou no salvar");
>>>>>>> 931b74f4e8f972057b0da6582d8447eadb916271
        
        $model = new ProdutoModel();

        $dados = [
            'nome'       => $this->request->getPost('nome'),
            'preco'      => $this->request->getPost('preco'),
            'quantidade' => $this->request->getPost('quantidade'),
        ];

        $model->insert($dados);

<<<<<<< HEAD
        return redirect()->to('/Produtos/sucesso');
=======
        return redirect()->to('/produtos/sucesso');
>>>>>>> 931b74f4e8f972057b0da6582d8447eadb916271
    }

    public function sucesso()
    {
        return 'Produto cadastrado com sucesso!';
    }
}
