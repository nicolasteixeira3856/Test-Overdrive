# EN-US
## Description
A simple software for registering companies and employees.

## Technologies
- Laravel 7
- Laravel UI
- Laravel Mix
- Bootstrap
- jQuery
- Axios
- Font Awesome
- Webpack

## Solution adopted
Since the feeling I got from the test was to test my knowledge not only in PHP, but also in the ecosystem of the Laravel framework, the methodology I adopted was to continue with the basic framework architecture (MVC) and focus my attention totally on other things of the framework, such as, for example, seeds, migrations, eloquent ORM, resource controllers, pagination and file upload.

## Executing the project in a development environment with Docker

### It is necessary to have Docker installed on your machine
If you don't have Docker installed on your machine yet, click here: https://www.docker.com

For Linux users it is also necessary to install Compose, refer to this documentation: https://docs.docker.com/compose/install/

### Follow the steps below at the project root folder:

#### If you're using Windows please consider to run the commands in PowerShell as a administrator  

Copy the sample laravel .env:
```
cp .env.example .env
```
Change the database settings from .env to:
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=overdrive
DB_USERNAME=overdrive_user
DB_PASSWORD=password
```
To execute with docker run the following commands:
```
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app npm install
docker-compose exec app npm run dev
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
docker-compose exec app php artisan storage:link
```
### NOTE: To run on Windows with Git Bash it is necessary to add winpty in the docker-compose exec commands, like this:
```
winpty docker-compose exec app composer install
winpty docker-compose exec app php artisan key:generate
winpty docker-compose exec app npm install
winpty docker-compose exec app npm run dev
winpty docker-compose exec app php artisan migrate
winpty docker-compose exec app php artisan db:seed
winpty docker-compose exec app php artisan storage:link
```
**After that the project should be available at http://localhost:8000 (local machine)**

## To close your Docker Compose environment run:
```
docker-compose down
```

## Executing the project in a development environment without Docker

### Software you will need
- PHP
- Composer
- MySQL
- Node
- NPM

Copy the sample laravel .env:
```
cp .env.example .env
```
#### Change the database settings from .env to your needs

To fully setup the project:
```
composer install
php artisan key:generate
npm install
npm run dev
php artisan migrate
php artisan db:seed
php artisan storage:link
```

To execute at localhost run: 
```
php artisan serve
```

# PT-BR
## Descrição
Um simples software para cadastro de companias e empregados.

## Tecnologias
- Laravel 7
- Laravel UI
- Laravel Mix
- Bootstrap
- jQuery
- Axios
- Font Awesome
- Webpack

## Solução adotada
Visto que a sensação que tive do teste era testar o meu conhecimento não apenas em PHP, mas também no ecossistema da framework Laravel a metodologia que adotei foi continuar com a arquitetura básica da framework (MVC) e focar totalmente a minha atenção para outras coisas da framework, como, por exemplo, seeds, migrations, eloquent ORM, resource controllers, paginação e upload de arquivos.

## Executando o projeto em ambiente de desenvolvimento com o Docker
### É necessário possuir o Docker instalado na sua máquina
Se ainda não possui clique aqui: https://www.docker.com

Para usuários Linux também é necessário instalar o Compose, veja a documentação aqui: https://docs.docker.com/compose/install/

### Siga os passos abaixo na pasta raiz do projeto:

#### Se você estiver usando o Windows, considere executar os comandos no PowerShell como administrador

Faça uma cópia do .env de exemplo padrão do Laravel:
```
cp .env.example .env
```
Mude as configurações de DB do .env para:
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=overdrive
DB_USERNAME=overdrive_user
DB_PASSWORD=password
```
Para executar com o docker rode os seguintes comandos:
```
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app npm install
docker-compose exec app npm run dev
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
docker-compose exec app php artisan storage:link
```
### NOTA: Para executar no Windows com Git Bash é necessário adicionar winpty na frente dos comandos docker-compose exec, da seguinte forma: 
```
winpty docker-compose exec app composer install
winpty docker-compose exec app php artisan key:generate
winpty docker-compose exec app npm install
winpty docker-compose exec app npm run dev
winpty docker-compose exec app php artisan migrate
winpty docker-compose exec app php artisan db:seed
winpty docker-compose exec app php artisan storage:link
```
**Após a execução o projeto poderá ser acessado por http://localhost:8000 (máquina local)**

## Para finalizar o ambiente do Docker Compose execute:
```
docker-compose down
```

## Executando o projeto num ambiente de desenvolvimento sem Docker

### Softwares necessários
- PHP
- Composer
- MySQL
- Node
- NPM

Copie o exemplo de .env do Laravel:
```
cp .env.example .env
```
#### Altere as configurações do banco de dados de .env de acordo com as suas necessidades

Para configurar totalmente o projeto:
```
composer install
php artisan key:generate
npm install
npm run dev
php artisan migrate
php artisan db:seed
php artisan storage:link
```

Para executar na máquina local execute:
```
php artisan serve
```
