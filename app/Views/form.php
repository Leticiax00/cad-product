<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
</head>
<body>
    <form>
        <div class="login-container">
        <h2>Edição de Produto</h2>
        
        <form id="loginForm">
            <div class="inputs-nome">
                <label for="name">Nome: </label>
                <input type="name" id="username" placeholder="Nome" required>
                <div class="error-message" id="usernameError"></div>
            </div>
            
            <div class="inputs">
                <label for="preco-pre">Preço: </label>
                <input type="preço" id="pre" placeholder="Ex.: 12,99" required>
            </div>
            
            <div class="inputs-quant">
                <label for="quant">Quantidade: </label>
                <input type="number" id="qua" placeholder="Ex.: 2" required>
            </div>

            <button type="submit">Salvar alterações</button>
        </form>
    </div>
    </form>

       <!-- <h1><= $produto['nome'] ?></h1>-->
       <!-- Informações do produto -->
</body>
</html>