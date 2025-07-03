<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'preco', 'quantidade'];
}
<<<<<<< HEAD

=======
>>>>>>> 91cbd332dac6fe3092e6d972ae90f5a8efd5849c
