# Documentação do Projeto

## Configuração do Ambiente

1. Execute o comando `docker-compose up --build` para criar o ambiente.
2. Execute o comando `php artisan migrate` para migrar as tabelas.
3. Execute o comando `php artisan db:seed --class=CustomersTableSeeder` para popular a tabela de clientes.
4. Execute o comando `php artisan db:seed --class=ProductsTableSeeder` para popular a tabela de produtos.

## Listar Produtos

-   Endpoint: `GET http://localhost/products`
-   Exemplo de resultado:

```json
[
    {
        "id": 2,
        "name": "teste",
        "price": 2.5,
        "image": "http://localhost/upload/phpF1QeAf.jpg",
        "created_at": "2023-06-02T01:57:12.000000Z",
        "updated_at": "2023-06-02T01:57:12.000000Z"
    },
    {
        "id": 3,
        "name": "Gladyce Barrows",
        "price": 11,
        "image": "https://via.placeholder.com/200x200.png/008800?text=non",
        "created_at": "2023-06-02T03:10:04.000000Z",
        "updated_at": "2023-06-02T03:10:04.000000Z"
    }
]
```

## Obter Detalhes de um Produto

-   Endpoint: GET http://localhost/products/{id}
-   Exemplo de resultado:

```json
{
    "id": 2,
    "name": "teste",
    "price": 2.5,
    "image": "http://localhost/upload/phpF1QeAf.jpg",
    "created_at": "2023-06-02T01:57:12.000000Z",
    "updated_at": "2023-06-02T01:57:12.000000Z"
}
```

## Criar um Novo Produto

-   Endpoint: POST http://localhost/products
-   Exemplo de dados a serem enviados:

```json
{
    "name": "Queijo",
    "price": 10.0,
    "image": "upload da imagem"
}
```

## Editar um Pedido

- Endpoint: PUT http://localhost/products/{id}
## Deletar um Produto
- Endpoint: DELETE http://localhost/products/{id}


## Listar Clientes
- Endpoint: GET http://localhost/customers
- Exemplo de resultado:

```json
[
    {
        "id": 2,
        "name": "Miss Carlotta Kohler MD",
        "email": "pierre.olson@example.org",
        "phone": "224-853-7198",
        "birth": "2017-08-12",
        "address": "5976 Selina Rapids Apt. 021",
        "complement": "Suite 318",
        "district": "Falkland Islands (Malvinas)",
        "zip": "94570-2357",
        "created_at": "2023-06-02T13:31:54.000000Z",
        "updated_at": "2023-06-02T13:31:54.000000Z"
    },
    {
        "id": 3,
        "name": "Helmer Brown",
        "email": "ayana.homenick@example.net",
        "phone": "830.446.0791",
        "birth": "1996-01-04",
        "address": "70975 Yost Ferry",
        "complement": "Suite 269",
        "district": "Gabon",
        "zip": "05213",
        "created_at": "2023-06-02T13:31:54.000000Z",
        "updated_at": "2023-06-02T13:31:54.000000Z"
    }
]
```
## Listar um cliente
- Rota: http://localhost/customers/{id}
- Método: GET
- Exemplo de resposta:
```json
{
    "id": 2,
    "name": "Miss Carlotta Kohler MD",
    "email": "pierre.olson@example.org",
    "phone": "224-853-7198",
    "birth": "2017-08-12",
    "address": "5976 Selina Rapids Apt. 021",
    "complement": "Suite 318",
    "district": "Falkland Islands (Malvinas)",
    "zip": "94570-2357",
    "created_at": "2023-06-02T13:31:54.000000Z",
    "updated_at": "2023-06-02T13:31:54.000000Z"
}
```

Criar um novo cliente
Rota: http://localhost/customers
Método: POST
Dados de exemplo:

```json
{
    "name": "Fulano",
    "email": "fulano@gmail.com",
    "phone": "1100000000",
    "birth": "2020-06-01",
    "address": "rua um dois tres",
    "district": "sao paulo",
    "zip": "02222020"
}
```

## Editar um cliente
- Rota: http://localhost/customers/{id}
- Método: PUT

## Deletar um cliente
- Rota: http://localhost/customers/{id}
- Método: DELETE

## Listar pedidos
- Rota: http://localhost/requests
- Método: GET
- Exemplo de resposta:

```json
[
    {
        "id": 1,
        "customer": {
            "id": 2,
            "name": "Miss Carlotta Kohler MD",
            "email": "pierre.olson@example.org",
            "phone": "224-853-7198",
            "birth": "2017-08-12",
            "address": "5976 Selina Rapids Apt. 021",
            "complement": "Suite 318",
            "district": "Falkland Islands (Malvinas)",
            "zip": "94570-2357",
            "created_at": "2023-06-02T13:31:54.000000Z",
            "updated_at": "2023-06-02T13:31:54.000000Z"
        },
        "products": [
            {
                "id": 2,
                "name": "teste",
                "price": 2.5,
                "image": "http://localhost/upload/phpF1QeAf.jpg",
                "created_at": "2023-06-02T01:57:12.000000Z",
                "updated_at": "2023-06-02T01:57:12.000000Z",
                "qtd": 1
            },
            {
                "id": 3,
                "name": "Gladyce Barrows",
                "price": 11,
                "image": "https://via.placeholder.com/200x200.png/008800?text=non",
                "created_at": "2023-06-02T03:10:04.000000Z",
                "updated_at": "2023-06-02T03:10:04.000000Z",
                "qtd": 1
            }
        ],
        "created_at": "2023-06-02T14:22:45.000000Z",
        "updated_at": "2023-06-02T14:22:45.000000Z"
    },
    {
        "id": 2,
        "customer": {
            "id": 2,
            "name": "Miss Carlotta Kohler MD",
            "email": "pierre.olson@example.org",
            "phone": "224-853-7198",
            "birth": "2017-08-12",
            "address": "5976 Selina Rapids Apt. 021",
            "complement": "Suite 318",
            "district": "Falkland Islands (Malvinas)",
            "zip": "94570-2357",
            "created_at": "2023-06-02T13:31:54.000000Z",
            "updated_at": "2023-06-02T13:31:54.000000Z"
        },
        "products": [
            {
                "id": 2,
                "name": "teste",
                "price": 2.5,
                "image": "http://localhost/upload/phpF1QeAf.jpg",
                "created_at": "2023-06-02T01:57:12.000000Z",
                "updated_at": "2023-06-02T01:57:12.000000Z",
                "qtd": 1
            },
            {
                "id": 3,
                "name": "Gladyce Barrows",
                "price": 11,
                "image": "https://via.placeholder.com/200x200.png/008800?text=non",
                "created_at": "2023-06-02T03:10:04.000000Z",
                "updated_at": "2023-06-02T03:10:04.000000Z",
                "qtd": 1
            }
        ],
        "created_at": "2023-06-02T14:23:03.000000Z",
        "updated_at": "2023-06-02T14:23:03.000000Z"
    }
]
```

## Listar um pedido
- Rota: http://localhost/requests/{id}
- Método: GET
- Exemplo de resposta:
```json
{
    "id": 1,
    "customer": {
        "id": 2,
        "name": "Miss Carlotta Kohler MD",
        "email": "pierre.olson@example.org",
        "phone": "224-853-7198",
        "birth": "2017-08-12",
        "address": "5976 Selina Rapids Apt. 021",
        "complement": "Suite 318",
        "district": "Falkland Islands (Malvinas)",
        "zip": "94570-2357",
        "created_at": "2023-06-02T13:31:54.000000Z",
        "updated_at": "2023-06-02T13:31:54.000000Z"
    },
    "products": [
        {
            "id": 2,
            "name": "teste",
            "price": 2.5,
            "image": "http://localhost/upload/phpF1QeAf.jpg",
            "created_at": "2023-06-02T01:57:12.000000Z",
            "updated_at": "2023-06-02T01:57:12.000000Z",
            "qtd": 1
        },
        {
            "id": 3,
            "name": "Gladyce Barrows",
            "price": 11,
            "image": "https://via.placeholder.com/200x200.png/008800?text=non",
            "created_at": "2023-06-02T03:10:04.000000Z",
            "updated_at": "2023-06-02T03:10:04.000000Z",
            "qtd": 1
        }
    ],
    "created_at": "2023-06-02T14:22:45.000000Z",
    "updated_at": "2023-06-02T14:22:45.000000Z"
}
```

## Editar um pedido
- Rota: http://localhost/requests/{id}
- Método: PUT

## Deletar um pedido
- Rota: http://localhost/requests/{id}
- Método: DELETE