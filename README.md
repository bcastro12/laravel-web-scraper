# Laravel Web Scraper - UpLexis Tecnologia

## Teste técnico

1. Envio via GitHub;
2. Todas as orientações para utilização/instalação do projeto devem estar no
   README.md;
3. Você deverá desenvolver uma aplicação que utilize PHP (se possível na versão mais
   recente que você conseguir) e Framework Laravel – versão 7 ou acima, onde deve
   utilizar o sistema de autenticação padrão do Laravel;
4. A aplicação deve ser capaz de realizar uma requisição com PHP ao site Quest
   MultiMarcas (https://www.questmultimarcas.com.br/estoque) e capturar os dados dos
   veículos retornados na busca (Se possível utilizar REGEX, para capturar os dados);
5. Os dados devem ser salvos em um banco de dados MySQL ou Postgres;
6. Banco de Dados MySQL
    - Adicionar um usuario (usuario: admin@admin.com, senha: admin);
    - Criar tabela carros (id, user_id, nome_veiculo, link, ano, combustivel, portas, quilometragem, cambio, cor);

## O Projeto

Como sistema de autenticação, foi utilizado o JetStream.

A configuração padrão do Laravel não permite que o índice seja mais que 1000 bytes. Para contornar isso, foi adicionado o comando `Schema::defaultStringLength(191);` na função boot do arquivo AppServiceProvider.php.

Foi adicionada a linha `protected $guarded = [];` na model Carro para permitir que seja possível fazer o mass assignment, utilizado para atualizar os dados como `Carro::findOrFail($request->id)->update($request->all());`.

## Para usar:

`git clone`

`composer install`

Renomeie o arquivo .env.example para .env e coloque suas credenciais locais

Crie um banco de dados chamado uplexis

`php artisan key:generate`

`php artisan migrate`

E por fim, rode o servidor: `php artisan serve`
