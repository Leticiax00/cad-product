<?php

namespace App\Controllers;

use App\Models\ProdutoModel;

class Produtos extends BaseController
{
    public function salvar()
    {
        $model = new ProdutoModel();

        $dados = [
            'nome'       => $this->request->getPost('nome'),
            'preco'      => $this->request->getPost('preco'),
            'quantidade' => $this->request->getPost('quantidade'),
        ];

        $model->insert($dados);

        return redirect()->to('/produtos/sucesso');
    }

    public function sucesso()
    {
        return 'Produto cadastrado com sucesso!';
    }
}
