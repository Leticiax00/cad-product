<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Gestão de Produtos</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        <div class="flex flex-col md:flex-row gap-8 w-full max-w-7xl px-4 py-10">
            <div class="bg-white rounded-2xl shadow-md p-8 flex flex-col justify-center md:h-[350px] overflow-auto w-full max-w-md">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-plus-circle mr-2" style="color: rgb(2, 2, 59);"></i> Cadastrar Produto
                </h2>
                <form action="<?= base_url('produtos/salvar') ?>" method="post" id="productForm" class="space-y-4">                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome do Produto</label>
                        <input type="text" id="name" name="nome" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Ex.: Notebook Dell" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Preço (R$)</label>
                            <input type="number" id="price" name="preco" step="0.01" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Ex.: 1299.99" required>
                        </div>
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantidade</label>
                            <input type="number" id="quantity" name="quantidade" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Ex.: 10" required>
                        </div>
                    </div>
                    <button type="submit" class="w-full py-3 px-4 rounded-lg font-medium hover:bg-[#d6d6d6] transition flex items-center justify-center" style="background-color: rgb(2, 2, 59); color: #fff;">
                        <i class="fas fa-save mr-2"></i> Salvar Produto
                    </button>
                </form>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-8 flex-1 flex flex-col w-full max-w-2xl">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-list-ul mr-2" style="color: rgb(2, 2, 59);"></i> Produtos Cadastrados
                    </h2>
                </div>
                <div id="productsList" class="flex flex-col gap-4 w-full">
                    <?php foreach ($produtos as $produto): ?>
                        <div class="product-card bg-gray-50 p-4 rounded-lg border border-gray-200 transition hover:shadow">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="font-medium text-lg text-gray-800 break-words truncate"><?= esc($produto['nome']) ?></h3>
                                    <div class="flex items-center mt-1 text-gray-600">
                                        <i class="fas fa-tag mr-2"></i>
                                        <span>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-sm px-2 py-1 rounded-full <?= $produto['quantidade'] == 0 ? 'bg-red-100 text-red-800' : ($produto['quantidade'] < 5 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') ?>">
                                        <?= $produto['quantidade'] ?> em estoque
                                    </span>
                                </div>
                            </div>
                            <div class="mt-2 flex gap-3">
                                <button class="edit-btn px-3 py-1 text-indigo-600 hover:text-indigo-800" data-id="<?= $produto['id'] ?>" data-nome="<?= esc($produto['nome']) ?>" data-preco="<?= esc($produto['preco']) ?>" data-quantidade="<?= esc($produto['quantidade']) ?>">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                                <button class="delete-btn px-3 py-1 text-red-600 hover:text-red-800" data-id="<?= $produto['id'] ?>">
                                    <i class="fas fa-trash-alt"></i> Excluir
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-xl p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-indigo-900">Editar Produto</h3>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="editForm" class="space-y-4" method="post" action="<?= base_url('produtos/editar') ?>">
                <input type="hidden" id="editId" name="id">
                <div>
                    <label for="editName" class="block text-sm font-medium text-gray-700 mb-1">Nome do Produto</label>
                    <input type="text" id="editName" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="editPrice" class="block text-sm font-medium text-gray-700 mb-1">Preço (R$)</label>
                        <input type="number" id="editPrice" name="price" step="0.01" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" required>
                    </div>
                    <div>
                        <label for="editQuantity" class="block text-sm font-medium text-gray-700 mb-1">Quantidade</label>
                        <input type="number" id="editQuantity" name="quantity" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" required>
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

    <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
    <script>
        const editModal = document.getElementById('editModal');
        const closeModal = document.getElementById('closeModal');
        const cancelEdit = document.getElementById('cancelEdit');
        const editForm = document.getElementById('editForm');

        closeModal.addEventListener('click', () => editModal.classList.add('hidden'));
        cancelEdit.addEventListener('click', () => editModal.classList.add('hidden'));

        $('.delete-btn').click(function () {
            var id = $(this).data('id');
            if (confirm('Tem certeza que deseja excluir o item com ID ' + id + '?')) {
                $.ajax({
                    url: '/produto_excluir/' + id,
                    type: 'POST',
                    success: function () {
                        alert('Produto excluído com sucesso!');
                        location.reload();
                    },
                    error: function () {
                        alert('Erro ao excluir o produto.');
                    }
                });
            }
        });

        $('.edit-btn').click(function () {
            $('#editId').val($(this).data('id'));
            $('#editName').val($(this).data('nome'));
            $('#editPrice').val($(this).data('preco'));
            $('#editQuantity').val($(this).data('quantidade'));
            $('#editModal').removeClass('hidden');
        });

        $('#cancelEdit, #closeModal').click(function () {
            $('#editModal').addClass('hidden');
        });
    </script>
</body>
</html>
