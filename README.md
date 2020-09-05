# api-contacts

Aplicação back-end que manipula dados contatos.

## Tecnologias

- Laravel
- PHP
- Eloquent
- PHPUnit
- MySQL
- Composer

## Preparação do ambiente

Clonando o projeto
```
git clone https://github.com/LucasMorais582/api-contacts.git
```

### Passos para inicializar a aplicação:

Criar banco de dados com o nome: "api_contacts" ou com o nome que desejar, desde que altere também no .env

Realizar a criação das tabelas com o comando:
```
php artisan migrate
```

Inicializar a aplicação com o comando:
```
php artisan serve
```

Para acessar a aplicação, utilize uma API Client como Postman ou Insomnia:
- http://localhost:8000
