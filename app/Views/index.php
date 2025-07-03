<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Produtos</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            background-color: rgb(2, 2, 59);
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col md:flex-row gap-8 w-full max-w-5xl px-4 py-10">
            <!-- Cadastro de Produto -->
              <div class="bg-white rounded-2xl shadow-md p-8 w-96 h-fit sticky top,0"> 
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-plus-circle mr-2" style="color: rgb(2, 2, 59);"></i> Cadastrar Produto
                </h2>

<form action="<?= base_url('Produtos/salvar') ?>" method="post" id="productForm" class="space-y-4">                    
        <?=csrf_field() ?>
        
                    <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome do Produto</label>
                        <input type="text" id="name" name="nome" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            placeholder="Ex.: Notebook Dell" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Preço (R$)</label>
                            <input type="number" id="price" name="preco" step="0.01" min="0"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                                placeholder="Ex.: 1299.99" required>
                        </div>
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantidade</label>
                            <input type="number" id="quantity" name="quantidade" min="0"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                                placeholder="Ex.: 10" required>
                        </div>
                    </div>
                    <button type="submit" 
                        class="w-full py-3 px-4 rounded-lg font-medium hover:bg-[#d6d6d6] transition flex items-center justify-center"
                        style="background-color: rgb(2, 2, 59); color: #fff;">
                        <i class="fas fa-save mr-2"></i> Salvar Produto
                    </button>
                </form>
            </div>
            <!-- Listagem de Produtos -->
            <div class="bg-white rounded-2xl shadow-md p-8 flex-1 flex flex-col">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-list-ul mr-2" style="color: rgb(2, 2, 59);"></i> Produtos Cadastrados
                    </h2>

                  
                </div>
                <div id="productsList" class="space-y-4">
                    <!-- Lista de produtos será carregada aqui -->
                     <?php foreach ($produtos as $produto): ?>
                        <div class="product-card bg-gray-50 p-4 rounded-lg border border-gray-200 transition hover:shadow">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="font-medium text-lg text-gray-800"><?= esc($produto['nome']) ?></h3>
                                    <div class="flex items-center mt-1 text-gray-600">
                                        <i class="fas fa-tag mr-2"></i>
                                        <span>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-sm px-2 py-1 rounded-full 
                                        <?= $produto['quantidade'] == 0 ? 'bg-red-100 text-red-800' : ($produto['quantidade'] < 5 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') ?>">
                                        <?= $produto['quantidade'] ?> em estoque
                                    </span>
                                </div>
                            </div>
                            <div class="flex justify-end space-x-2 mt-3">
                                <button onclick="window.location.href='<?= base_url('/produto/editar/') . $produto['id'] ?>'" class="edit-btn px-3 py-1" style="color: rgb(2, 2, 59);" 
                                    onmouseover="this.style.color='#2563eb'" 
                                    onmouseout="this.style.color='rgb(2, 2, 59)'" 
                                    
                                    data-price="<?= $produto['preco'] ?>" data-quantity="<?= $produto['quantidade'] ?>">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                                <button class="delete-btn px-3 py-1 text-red-600 hover:text-red-800" data-id="<?= $produto['id'] ?>">
                                    <i class="fas fa-trash-alt"></i> Excluir
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- Mensagem de vazio -->
                    <p id="emptyMessage" class="text-gray-500 hidden">Nenhum produto cadastrado.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Edição -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-indigo-900">Editar Produto</h3>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="editForm" class="space-y-4">
                <input type="hidden" id="editId">
                <div>
                    <label for="editName" class="block text-sm font-medium text-gray-700 mb-1">Nome do Produto</label>
                    <input type="text" id="editName" name="name" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="editPrice" class="block text-sm font-medium text-gray-700 mb-1">Preço (R$)</label>
                        <input type="number" id="editPrice" name="price" step="0.01" min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" required>
                    </div>
                    <div>
                        <label for="editQuantity" class="block text-sm font-medium text-gray-700 mb-1">Quantidade</label>
                        <input type="number" id="editQuantity" name="quantity" min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" required>
                    </div>
                </div>
                <div class="flex justify-end space-x-3 pt-2">
                    <button type="button" id="cancelEdit" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Cancelar
                    </button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        // Elementos do DOM - atribuição do nome das listas como variáveis
        const productForm = document.getElementById('productForm'); // Clientes cadastrados
        const productsList = document.getElementById('productsList');
        const emptyMessage = document.getElementById('emptyMessage'); // mensagem quando não há produtos
        const refreshBtn = document.getElementById('refreshBtn'); // atualiza lista 
        const editModal = document.getElementById('editModal'); // janela de edição
        const closeModal = document.getElementById('closeModal');
        const cancelEdit = document.getElementById('cancelEdit'); // cancelar janela edição
        const editForm = document.getElementById('editForm'); // editar formulario 

        /*  productForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = {
             id: Date.now(),
             name: document.getElementById('name').value,
              price: parseFloat(document.getElementById('price').value),
              quantity: parseInt(document.getElementById('quantity').value)
          };
            let products = getProducts();
            products.push(formData);
            setProducts(products);
            productForm.reset();
            showToast('Produto cadastrado com sucesso!', 'success');
        }); */

        closeModal.addEventListener('click', () => editModal.classList.add('hidden'));
        cancelEdit.addEventListener('click', () => editModal.classList.add('hidden'));

        function showToast(message, type) {
            const toast = document.createElement('div');
            toast.className = `fixed bottom-5 right-5 px-6 py-3 rounded-lg shadow-lg text-white font-medium flex items-center ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}`;
            toast.innerHTML = `
                <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} mr-2"></i>
                ${message}
            `;
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }


        $('.delete-btn').click(function () {
            var id = $(this).data('id');
            
            // Exemplo: confirmação antes de excluir
            if (confirm('Tem certeza que deseja excluir o item com ID ' + id + '?')) {
                // Aqui você pode fazer uma requisição AJAX para deletar no backend
                console.log('Excluir item com ID:', id);

                // Exemplo de requisição AJAX (ajuste a URL e método conforme seu backend)
                $.ajax({
                    url: '/produto_excluir/' + id,
                    type: 'POST', // ou 'DELETE'
                    success: function (response) {
                        alert('Produto excluído com sucesso!');
                        location.reload(); // recarrega a página após exclusão
                    },
                    error: function (xhr, status, error) {
                        alert('Erro ao excluir o produto.');
                        console.error(error);
                    }
                });
            }
});
    </script>
    
</body>
</html>
