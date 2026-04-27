# 📝 Sistema de Gerenciamento de Tarefas (To-Do List)

Este é um sistema de **CRUD (Create, Read, Update, Delete)** desenvolvido como avaliação prática para a disciplina de Programação Web. O projeto consiste em um gerenciador de tarefas individual, onde cada usuário pode realizar seu login e organizar suas pendências.

## 🚀 Funcionalidades

- **Autenticação Segura**: Sistema de login com proteção de sessão e senhas criptografadas em MD5.
- **Gerenciamento de Tarefas**: 
    - Criar novas tarefas com título e descrição.
    - Listar tarefas em uma tabela dinâmica.
    - Editar informações de tarefas existentes.
    - Concluir tarefas rapidamente (alteração de status via um clique).
    - Excluir registros do banco de dados.
- **Interface Responsiva**: Layout moderno desenvolvido com **Bootstrap 5**, utilizando componentes como cards, badges coloridos para status e tabelas estilizadas.
- **Segurança de Dados**: Uso de **Prepared Statements** (PDO) com `bindParam` para evitar ataques de SQL Injection.

## 🛠️ Tecnologias Utilizadas

- **PHP 8.x** (Lógica de back-end)
- **MySQL / MariaDB** (Banco de dados)
- **Bootstrap 5** (Framework de UI/Layout)
- **PDO** (Interface de conexão com banco de dados)

## 📂 Estrutura do Projeto

O projeto foi organizado seguindo as diretrizes acadêmicas:

* `conexao.php`: Configuração da conexão com o banco de dados via PDO.
* `login.php` / `logout.php`: Gerenciamento de acesso e sessões.
* `index.php`: Dashboard principal com a listagem protegida por sessão.
* `nova.php`: Formulário de cadastro de novas tarefas.
* `editar.php`: Interface para edição de dados e status.
* `concluir.php` / `excluir.php`: Scripts de processamento rápido de ações.
* `header.php` / `footer.php`: Componentes de layout reutilizáveis.

## 🔧 Como Rodar o Projeto

1. Certifique-se de ter um ambiente como **XAMPP** ou **WAMP** instalado.
2. Clone este repositório para a pasta `htdocs`.
3. Importe o arquivo SQL (disponível no repositório) para criar o banco de dados `tarefas`.
4. Acesse no navegador: `http://localhost/nome-da-sua-pasta/login.php`.
5. Utilize as credenciais de teste:
   - **Usuário**: `admin`
   - **Senha**: `123456`

---
Desenvolvido para fins didáticos.
