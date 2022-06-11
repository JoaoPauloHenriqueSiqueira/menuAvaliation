
# About the project

This is a model application for applying TDD, documentation, Clean COde and best practices
In addition to a CRUD with VUE, we will have the creation of API's for customer consumption - creating an application for mobile devices (FLUTTER)

# Installation
download the project

```
git clone https://github.com/JoaoPauloHenriqueSiqueira/menuAvaliation.git
```

## Create .env

```
cp .env.example .env
```

## Change database values to the desired (.env created) . Example:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=mybank here
DB_USERNAME=root
DB_PASSWORD=root
```

## upload containers
```
docker-compose up -d
```
## install dependencies
```
composer install
```
## generate key
```
php artisan key:generate
```
