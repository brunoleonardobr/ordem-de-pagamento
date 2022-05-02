# Executando o projeto

## Antes de instalar
- É necessário a instalação do PHP 7.2
- É necessário a instalação do composer

## Instalação
- Ao baixar o repositório, executar os comandos no terminal

### instalação das dependências
> composer install

### criar o arquivo database.sqlite no diretorio /databases se não existir

### rodar as migrations no arquivo database.sqlite
> php artisan migrate

## Rodar o projeto

### abra 3 terminais
#### no primeiro digite o comando para rodar o servidor do laravel
> php artisan serve

#### no segundo digite o comando para rodar a fila de processamento
> php artisan queue:work

#### no terceiro digite o comando para rodar o agendador de tarefas
> pgp artisan schedule:work

## Métodos da api
> (POST) - /pagamentos/criar - cria pagamento de acordo com parâmetros do body
> (GET) - /pagamentos - lista pagamentos
> (GET) - /pagamentos/{id} - busca pagamento por ID
## Vendo os logs
na execução do projeto é possível ver todo o processamento rodando no arquivo de logs do laravel 'laravel.log'
