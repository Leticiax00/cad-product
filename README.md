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
