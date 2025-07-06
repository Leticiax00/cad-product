<?php

namespace App\Controllers;

use App\Models\ProdutoModel;

class Produtos extends BaseController
{

    public function index()
    {
       //Teste de conexão com o banco de dados
        $model = new ProdutoModel();
        $produtos = $model->findAll();
<<<<<<< HEAD
      // dd($produtos);
        return view('produtos/index', ['produtos' => $produtos]);
=======
       // dd($produtos);
        return view('index', ['produtos' => $produtos]);
>>>>>>> 47273fc13761656d4fb392da394c9473c6a03c9d
    }

    public function salvar()
    {
        $produtoModel = new ProdutoModel();
        $data = [
            'nome'  => $this->request->getPost('nome'),
            'preco' => $this->request->getPost('preco'),
            'quantidade' => $this->request->getPost('quantidade'),
        ];
<<<<<<< HEAD
        $produtoModel->insert($data);
        return view('produtos_cadastro');
=======

        if ($model->insert($dados)) {
            return redirect()->to('/produtos/sucesso');
        }

        else {
            echo '<pre>';
            print_r($model->erros());
            echo '</pre>';
            exit;
        }
>>>>>>> 47273fc13761656d4fb392da394c9473c6a03c9d
    }

        public function sucesso()
    {
        return 'Produto cadastrado com sucesso!';
    
    }

    public function editar()
{
     $id = $this->request->getPost('id');

    if ($id) {
        $data = [
            'nome' => $this->request->getPost('name'),
            'preco' => $this->request->getPost('price'),
            'quantidade' => $this->request->getPost('quantity'),
        ];

        $produtoModel = new \App\Models\ProdutoModel();
        $produtoModel->update($id, $data);

        return view ('produtos');

    } else {
        throw new \Exception('ID do produto não fornecido.');
    }
}

public function produto($id)
{
    $model = new ProdutoModel();
    $produto = $model->find($id);

    if (!$produto) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Produto não encontrado: $id");
    }

    return view('produto', ['produto' => $produto]);
}

}





