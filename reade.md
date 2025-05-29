# AMA - Clube da Amizade Padre Antônio Gonçalves

Sistema web desenvolvido em PHP com padrão MVC para gestão de cursos, turmas, eventos e comunicações do Clube da Amizade Padre Antônio Gonçalves.

## Tecnologias Utilizadas

- PHP 8.x
- MariaDB
- Bootstrap 5
- XAMPP (ambiente local)
- Composer (para futuras dependências)
- Estrutura MVC personalizada

## Estrutura do Projeto

- `public/` – Arquivo de entrada (index.php)
- `app/controllers/` – Controladores do sistema
- `app/models/` – Modelos (acesso ao banco)
- `app/views/` – Páginas HTML/PHP
- `core/` – Classes base `App` e `Controller`
- `config/` – Arquivos de configuração e conexão

## Funcionalidades

- Área administrativa com login
- CRUD de cursos e turmas
- Logs de ações administrativas
- Layout responsivo e acessível
- Preparado para expansão (eventos, avisos, galeria, espiritualidade)

## Acesso Padrão

Usuários cadastrados:
- `eduardo` (root)
- `ama` (admin)
- `orlando` (leitor)
- `teste` (admin, uso temporário)

## Licença

Projeto interno sem fins comerciais.
