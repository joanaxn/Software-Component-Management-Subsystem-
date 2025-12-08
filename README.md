# Software Component Management Subsystem

HTML • CSS • JavaScript • PHP • MySQL

Sistema web desenvolvido no âmbito das unidades curriculares de Engenharia de Software e Laboratório de Tecnologias Web, com o objetivo de criar uma plataforma completa para gestão de componentes de software, versões, dependências, utilizadores e permissões.

Este subsistema inclui interfaces dedicadas para Administradores e Developers, garantindo controlo de acesso e funcionalidades específicas para cada perfil.

## Funcionalidades Principais
### Gestão de Utilizadores (Admin)
- Login e gestão de sessões
- Registo de novos utilizadores
- Edição de dados e desativação de contas
- Atribuição dinâmica de permissões aos developers

### Gestão de Permissões
-Criação de novas permissões
-Atribuição e remoção de permissões-
Controlo de visibilidade com base no papel do utilizador

### Gestão de Componentes (Developer)
- Registo de novos componentes
- Pesquisa de componentes
- Validação de dados e tratamento de erros

### Gestão de Dependências
- Definir dependências entre componentes
- Alterar dependências
- Remover dependências
- Validação automática para evitar inconsistências

### Gestão de Versões
- Registar novas versões
- Listar versões existentes
- Mensagens dinâmicas quando não existem versões

### Backup & Restore
- Criação de backups automáticos
- Seleção de ficheiros de backup na interface
- Restauração da base de dados via mysqldump

### Interface & UX
- Tema claro/escuro
- Tradução via Google Translate
- Layout simples, intuitivo e responsivo

## Base de Dados
### Tabelas principais

1. srsUser — Utilizadores
2. srsUserRole — Papéis (Admin / Developer)
3. srsPerm — Permissões disponíveis
4. srsDevPerm — Permissões atribuídas por developer
5. srsComp — Componentes
6. srsCompVersion — Versões dos componentes
7. srsBackup — Lista de backups

### Modelação baseada em UML
- Package Diagram
- Class Diagram
- ER Model
- Hybrid Diagram

### Tecnologias Utilizadas
- HTML5
- CSS3
- JavaScript
- PHP 8.1
- MySQL
- Google Translate Widget
- jQuery TableSorter


### Como Executar o Projeto (Sem XAMPP)
### 1️. Pré-requisitos

PHP ≥ 8.1 instalado
Verificar com:
  ####  php -v


MySQL ou MariaDB instalado
Verificar com:
   #### mysql --version

### 2️. Criar a Base de Dados
Abrir o terminal e executar:

## mysql -u root -p -e "CREATE DATABASE srsWeb;"

### 3️. Importar o ficheiro SQL

Na pasta do projeto, correr:
   #### mysql -u root -p srsWeb < sqlBD.sql

### 4️. Iniciar o Servidor PHP

Navegar até à pasta group3 (onde está o projeto):

  #### cd group3
  #### php -S localhost:8000

### Aceder no navegador

Abrir:

   #### http://localhost:8000/Login/login.php

