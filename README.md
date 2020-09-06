# EN-US
## Executing the project in a development environment with docker
To execute with docker run the following commands
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
**After that the project should be available at http://localhost:8000**

## To close your Docker Compose environment run:
```
docker-compose down
```

# PT-BR
## Executando o projeto em ambiente de desenvolvimento com o Docker
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
**Após a execução o projeto poderá ser acessado por http://localhost:8000 (máquina local)**

## Para finalizar o ambiente do Docker Compose execute:
```
docker-compose down
```
