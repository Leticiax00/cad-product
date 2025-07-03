<?php

namespace App\Controllers;

use App\Models\ProdutoModel;

class Produtos extends BaseController
{

    public function index()
    {
<<<<<<< HEAD
       //Teste de conexão com o banco de dados
        $model = new ProdutoModel();
        $produtos = $model->findAll();
       // dd($produtos);
        return view('index', ['produtos' => $produtos]);
=======
       //TEste de conexão com o banco de dados
        $model = new ProdutoModel();
        $produtos = $model->findAll();
       dd($produtos);
        //return view('produtos/index', ['produtos' => $produtos]);
>>>>>>> 91cbd332dac6fe3092e6d972ae90f5a8efd5849c
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

<<<<<<< HEAD
        if ($model->insert($dados)) {
            return redirect()->to('/produtos/sucesso');
        }

        else {
            echo '<pre>';
            print_r($model->erros());
            echo '</pre>';
            exit;
        }
    }

        public function sucesso()
    {
        return 'Produto cadastrado com sucesso!';
    
=======
        $model->insert($dados);

        return redirect()->to('/Produtos/sucesso');
    }

    public function sucesso()
    {
        return 'Produto cadastrado com sucesso!';
>>>>>>> 91cbd332dac6fe3092e6d972ae90f5a8efd5849c
    }
}
