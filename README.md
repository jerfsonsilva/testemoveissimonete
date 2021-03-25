# Bem vindo(a) ao meu mundo

## Aplicação feita utilizando o framework Laravel

### para executar basta rodar os seguintes comandos no terminal na pasta do projeto:
```
composer install
```
##### Ele vai instalar todos os pacotes php necessários
```
php artisan key:generate
```
##### Esse vai gerar uma chave para sua aplicação

##### Depois precisa renomear o arquivo .ENV.EXAMPLE para .ENV e configurar os dados do seu banco

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
```

##### Agora basta rodar o comando:
```
Php artisan migrate
```
##### Para criar o banco de dados e 
```
php artisan db:seed
```
##### Para gerar Artigos automaticos

## Pronto, espero que gostem ;)

## Bibliotecas de terceiros utilizadas
##### Framework backend php  Laravel - facilidade de uso, segurança e utilização do Symfony
##### Framework fontend Vue js, vue-js-modal, v-mask, necessario para poder criar um frontend baseado em componentes
##### Boostrap biblioteca CSS para estilizar a pagina de forma pratica e responssiva 
##### Jquery uma dependencia do Boostrap

# API de Posts

Esta API é destinada para a manipulação de posts e cadastro de contatos

## Endpoints

### GET /artigos
Esse Enpoint é responsavel por retornar todos os artigos do banco de dados

#### Parametros 
Nenhum

#### Respostas

##### OK! 200
Caso sua solitação ocorra tudo bem

Exemplo de resposta:

```
{
    "itens": [
        {
            "id": 1,
            "foto": "https://via.placeholder.com/500x500.png/00eeee?text=86+labore",
            "titulo": "aveum",
            "autor": "Dr. Enoch Rohan V",
            "conteudo": "Et qui quidem fugit eaque officiis reprehenderit maxime. Dolores iure ab provident eos quasi aliquam soluta. Dicta qui consequatur voluptatem consequuntur nobis ipsam sapiente ipsa.",
            "created_at": "2021-03-24T23:38:18.000000Z",
            "updated_at": "2021-03-24T23:38:18.000000Z"
        },
        {
            "id": 2,
            "foto": "https://via.placeholder.com/500x500.png/0066ee?text=86+sint",
            "titulo": "korey80",
            "autor": "Virgie Beier DDS",
            "conteudo": "Eos voluptas placeat id libero eligendi. Repellendus sed dolor voluptatibus blanditiis magni. Aut aut enim sunt sunt fuga cum ipsa.",
            "created_at": "2021-03-24T23:38:18.000000Z",
            "updated_at": "2021-03-24T23:38:18.000000Z"
        }
    ],
      "_links": [
        {
            "href": "http://127.0.0.1:8000/artigo/0",
            "method": "get",
            "rel": "visualizar_artigo"
        },
        {
            "href": "http://127.0.0.1:8000/artigos",
            "method": "get",
            "rel": "listar_artigo"
        }
    ]
}
```


### GET /artigo/ID
Esse Enpoint é responsavel por exibir um artigo especifico 

#### Parametros 
id: ID artigo cadastrado no sistema.


#### Respostas

##### Objeto não encontrado! 404
Caso o artigo não exista no banco de dados
Motivos: ID invalido

Exemplo de resposta:

```
{
    "err": "Objeto não encontrado",
    "_links": [
        {
            "href": "http://127.0.0.1:8000/artigo/0",
            "method": "get",
            "rel": "visualizar_artigo"
        },
        {
            "href": "http://127.0.0.1:8000/artigos",
            "method": "get",
            "rel": "listar_artigo"
        }
    ]
}
```

##### OK! 200
Caso sua solitação ocorra tudo bem

Exemplo de resposta:

```

{
    "item": {
        "id": 1,
        "foto": "https://via.placeholder.com/500x500.png/00eeee?text=86+labore",
        "titulo": "aveum",
        "autor": "Dr. Enoch Rohan V",
        "conteudo": "Et qui quidem fugit eaque officiis reprehenderit maxime. Dolores iure ab provident eos quasi aliquam soluta. Dicta qui consequatur voluptatem consequuntur nobis ipsam sapiente ipsa.",
        "created_at": "2021-03-24T23:38:18.000000Z",
        "updated_at": "2021-03-24T23:38:18.000000Z"
    },
    "_links": [
        {
            "href": "http://127.0.0.1:8000/artigo/1",
            "method": "get",
            "rel": "visualizar_artigo"
        },
        {
            "href": "http://127.0.0.1:8000/artigos",
            "method": "get",
            "rel": "listar_artigo"
        }
    ]
}
```


### GET /contatos
Esse Enpoint é responsavel por exibir uma lista de contatos cadastrado no sistema

#### Parametros 
Nenhum

#### Respostas


##### OK! 200
Caso sua solitação ocorra tudo bem

Exemplo de resposta:

```
{
    "itens": [
        {
            "id": 1,
            "nome": "jerfson silva",
            "email": "jerfsonlink@gmail.com",
            "telefone": "73 982394564",
            "conteudo": "teste teste",
            "created_at": "2021-03-25T00:39:33.000000Z",
            "updated_at": "2021-03-25T00:39:33.000000Z"
        },
        {
            "id": 2,
            "nome": "jerfson silva",
            "email": "jerfsonlink@gmail.com",
            "telefone": "73 982394564",
            "conteudo": "teste teste",
            "created_at": "2021-03-25T00:40:02.000000Z",
            "updated_at": "2021-03-25T00:40:02.000000Z"
        }
    ],
    "_links": [
        {
            "href": "http://127.0.0.1:8000/contatos",
            "method": "get",
            "rel": "listar_contatos"
        },
        {
            "href": "http://127.0.0.1:8000/contatos/add",
            "method": "POST",
            "rel": "criar_contato"
        }
    ]
}
```


### POST /contatos/add
Esse Enpoint é responsavel por cadastrar um novo contato no sistema

#### Parametros 
nome: Nome do usuario.
telefone: Telefone do usuario.
conteudo: Conteudo do usuario.
email: E-mail do usuario.

Exemplo de parametro:

```
{
    "email": "jerfsonlink@gmail.com",
    "nome": "jerfson silva",
    "telefone": "73 982394564",
    "conteudo" : "teste teste"
}
```

#### Respostas


##### Pre-condição falhou 412

Caso os parametros obrigatorio não sejam passados

Exemplo de resposta:
```
{
    "err": "O campo nome é obrigatório., O campo telefone é obrigatório., O campo conteudo é obrigatório.",
    "_links": [
        {
            "href": "http://127.0.0.1:8000/contatos",
            "method": "get",
            "rel": "listar_contatos"
        },
        {
            "href": "http://127.0.0.1:8000/contatos/add",
            "method": "POST",
            "rel": "criar_contato"
        }
    ]
}
```

##### Erro interno 500

Caso o banco de dados não aceite os dados

Exemplo de resposta:
```
{
    "err": "Erro ao salvar conteudo",
    "_links": [
        {
            "href": "http://127.0.0.1:8000/contatos",
            "method": "get",
            "rel": "listar_contatos"
        },
        {
            "href": "http://127.0.0.1:8000/contatos/add",
            "method": "POST",
            "rel": "criar_contato"
        }
    ]
}
```

##### OK! 200
Caso sua solitação ocorra tudo bem

Exemplo de resposta:

```
{
    "resultado": true,
    "_links": [
        {
            "href": "http://127.0.0.1:8000/contatos",
            "method": "get",
            "rel": "listar_contatos"
        },
        {
            "href": "http://127.0.0.1:8000/contatos/add",
            "method": "POST",
            "rel": "criar_contato"
        }
    ]
}
```

