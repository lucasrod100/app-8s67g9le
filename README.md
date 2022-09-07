## Sobre o projeto

Aplicação construída para a realização da prova da Appmax, utilizando
as seguintes tecnologias na versão:

- Laravel 9.19
- PHP 8.0.2

## Instalação para rodar o app localmente:

- Executar o comando: composer install -> para instalar as dependências
- Duplicar o arquivo .env.example e renomear para .env
- Criar o banco de dados mysql localmente e realizar as configurações no .env do nome do banco de dados, usuário e senha, conforme o exemplo:
  * DB_DATABASE=prova_appmax
  * DB_USERNAME=root
  * DB_PASSWORD=
- php artisan migrate -> para realizar a criação das tabelas
- php artisan db:seed -> para popular a tabela de dominío tipo movimentação

## Padrões utilizados

- Service Layer: utilizando para a camada das regras de negócio
- Repository Pattern: Utilizando para isolar a camada de acesso aos dados
- DTO: utilizando para fazer a trasferência dos dados entre as camadas

