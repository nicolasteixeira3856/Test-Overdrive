# EN-US
## Executing the project in a development environment with docker
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
### NOTE:To run on Windows with Git Bash it is necessary to add winpty in the docker-compose exec commands, like this:
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

# PT-BR
## Executando o projeto em ambiente de desenvolvimento com o Docker
Faça uma copia do .env de exemplo padrão do Laravel:
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
