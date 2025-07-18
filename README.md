# 📦 Gestão de Produtos

Este projeto é uma aplicação web simples para **gerenciar produtos**, permitindo o cadastro, visualização, edição e exclusão de itens.

---

## 🚀 Funcionalidades

### 1️⃣ Cadastro de Produtos

- **Formulário de Cadastro:** Na página inicial, há um formulário intuitivo para adicionar novos produtos.
- **Campos:**
  - **Nome do Produto:** Nome descritivo do item.
  - **Preço (R$):** Valor unitário do produto.
  - **Quantidade:** Número de unidades disponíveis em estoque.
- **Salvamento:** Ao preencher os dados e clicar em **"Salvar Produto"**, o item é adicionado à lista de produtos.

---

### 2️⃣ Listagem de Produtos

- **Visualização:** Todos os produtos cadastrados são exibidos em uma lista na página principal.
- **Detalhes do Produto:** Para cada produto, são mostrados:
  - Nome
  - Preço (formatado em Reais)
  - Quantidade em estoque
- **Indicador de Estoque:** A quantidade em estoque possui um indicador visual:
  - **Vermelho:** Estoque zerado.
  - **Amarelo:** Estoque baixo (menos de 5 unidades).
  - **Verde:** Estoque normal (5 ou mais unidades).

---

### 3️⃣ Edição de Produtos

- **Botão "Editar":** Cada produto na lista possui um botão **Editar**.
- **Modal de Edição:** Ao clicar em **Editar**, um modal é exibido com os dados atuais do produto.
- **Atualização:** É possível modificar o nome, preço e quantidade do produto.
- **Salvamento de Alterações:** Clique em **"Salvar Alterações"** dentro do modal para aplicar as mudanças.

---

### 4️⃣ Exclusão de Produtos

- **Botão "Excluir":** Cada produto na lista possui um botão **Excluir**.
- **Confirmação:** Ao clicar em **Excluir**, uma confirmação é solicitada para evitar exclusões acidentais.
- **Remoção:** Após a confirmação, o produto é removido permanentemente da lista.

---

## 🛠️ Tecnologias Utilizadas

- **Backend:** PHP com o framework **CodeIgniter 4**.
- **Servidor Local:** **XAMPP** (Apache e MySQL).
- **Banco de Dados:** MySQL.
- **Frontend:**
  - HTML
  - CSS (**Tailwind CSS** para estilização)
  - JavaScript (**jQuery** para interatividade e manipulação do DOM)
  - Ícones: **Font Awesome**

---

## ⚙️ Instalação e Configuração

### 📌 Pré-requisitos

- **XAMPP:** Instale o XAMPP para rodar o Apache e o MySQL.
- **Composer:** Tenha o Composer instalado globalmente.

---

### 📌 Passos

#### 1️⃣ Clone o Repositório

```bash
git clone <URL_DO_SEU_REPOSITORIO>
cd gestao-produtos
```

#### 2️⃣ Mova para o `htdocs` do XAMPP

Copie a pasta clonada (**gestao-produtos**) para o diretório `htdocs` do XAMPP.  
Exemplo no Windows: `C:\xampp\htdocs\gestao-produtos`.

---

#### 3️⃣ Inicie os Serviços do XAMPP

Abra o **Painel de Controle do XAMPP** e inicie os módulos **Apache** e **MySQL**.

---

#### 4️⃣ Configure o Banco de Dados

1. Acesse o **phpMyAdmin** no navegador (geralmente: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)).
2. Crie um banco de dados chamado `banco_produtos`.
3. No arquivo `app/Config/Database.php` verifique ou configure as credenciais do banco.
4. Crie a tabela `produtos` manualmente no **phpMyAdmin** com o seguinte comando:

```sql
CREATE TABLE `produtos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `quantidade` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

**💡 Dica:** Se tiver migrações configuradas no CodeIgniter, pode rodá-las pela CLI.

---

#### 5️⃣ Instale as Dependências do Composer

No terminal (ou Git Bash) na pasta do projeto:

```bash
composer install
```

---

#### 6️⃣ Ajuste Permissões (Linux/macOS)

Se necessário, dê permissão de escrita para as pastas:

```bash
chmod -R 775 writable
chmod -R 775 public/uploads # Caso tenha pasta de uploads
```

---

#### 7️⃣ Acesse a Aplicação

Abra seu navegador e acesse:

```
http://localhost/gestao-produtos/public
```

(Substitua `gestao-produtos` pelo nome da pasta que colocou no `htdocs`.)

---

## ✅ Pronto!

Agora é só começar a cadastrar, editar e gerenciar seus produtos!

---

**📌 Autor:** *Letícia Ramos*


