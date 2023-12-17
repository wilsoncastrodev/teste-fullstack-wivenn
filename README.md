
# Teste - Empresa Wivenn - Vaga Desenvolvedor Fullstack Mid-Level

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)  ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![PostgreSQL](https://img.shields.io/static/v1?style=for-the-badge&message=PostgreSQL&color=4169E1&logo=PostgreSQL&logoColor=FFFFFF&label=)  ![JavaScript](https://img.shields.io/static/v1?style=for-the-badge&message=JavaScript&color=222222&logo=JavaScript&logoColor=F7DF1E&label=)  ![TypeScript](https://img.shields.io/static/v1?style=for-the-badge&message=TypeScript&color=3178C6&logo=TypeScript&logoColor=FFFFFF&label=)  ![React](https://img.shields.io/static/v1?style=for-the-badge&message=React&color=222222&logo=React&logoColor=61DAFB&label=)  ![Redux](https://img.shields.io/static/v1?style=for-the-badge&message=Redux&color=764ABC&logo=Redux&logoColor=FFFFFF&label=)  ![HTML5](https://img.shields.io/static/v1?style=for-the-badge&message=HTML5&color=E34F26&logo=HTML5&logoColor=FFFFFF&label=)  ![CSS3](https://img.shields.io/static/v1?style=for-the-badge&message=CSS3&color=1572B6&logo=CSS3&logoColor=FFFFFF&label=)  ![Sass](https://img.shields.io/static/v1?style=for-the-badge&message=Sass&color=CC6699&logo=Sass&logoColor=FFFFFF&label=) ![Bootstrap](https://img.shields.io/static/v1?style=for-the-badge&message=Bootstrap&color=7952B3&logo=Bootstrap&logoColor=FFFFFF&label=) ![RabbitMQ](https://img.shields.io/static/v1?style=for-the-badge&message=RabbitMQ&color=FF6600&logo=RabbitMQ&logoColor=FFFFFF&label=) ![Nginx](https://img.shields.io/badge/nginx-%23009639.svg?style=for-the-badge&logo=nginx&logoColor=white) ![Docker](https://img.shields.io/static/v1?style=for-the-badge&message=Docker&color=2496ED&logo=Docker&logoColor=FFFFFF&label=)  ![Git](https://img.shields.io/static/v1?style=for-the-badge&message=Git&color=F05032&logo=Git&logoColor=FFFFFF&label=)  ![GitHub](https://img.shields.io/static/v1?style=for-the-badge&message=GitHub&color=181717&logo=GitHub&logoColor=FFFFFF&label=)  ![Linux](https://img.shields.io/static/v1?style=for-the-badge&message=Linux&color=222222&logo=Linux&logoColor=FCC624&label=)

## Objetivo
Desenvolver uma aplicação de Reservas de Livros de uma Biblioteca que permita que utilizadores (leitores e bibliotecários)
gerenciem o processo de reserva de livros online. O sistema deve oferecer funcionalidades que incluem
cadastro e autenticação de usuários, pesquisa de livros, realização e cancelamento de reservas,
notificações para bibliotecários e gerenciamento centralizado das reservas dos usuários.

<br>

> Nota: Apesar de eu ter conseguido concluir o projeto proposto, infelizmente não foi possível entregá-lo na data prevista. Houve um atraso de três dias em relação ao prazo estabelecido na descrição do teste. Este atraso foi causado por imprevistos que surgiram durante o desenvolvimento do projeto.

<br>

![Challenge - Incompleted](https://img.shields.io/badge/Challenge-Incompleted-red) ![PHPUnit - Testing](https://img.shields.io/badge/PHPUnit-Testing-31c754) ![Tests - 26 passed](https://img.shields.io/badge/Tests-26_passed-31c754) ![Tests - 4 fails](https://img.shields.io/badge/Tests-4_fails-red) ![Commits - 30](https://img.shields.io/badge/Commits-30-23bbca)

## Instruções do Teste
- [Clique aqui](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/TESTE.md) para visualizar as instruções do teste

## Índice
- [Demonstração](#demonstração)
- [Funcionalidades Implementadas](#funcionalidades-implementadas)
- [Diferenciais Implementados](#diferenciais-implementados)
- [Informações Adicionais](#informações-adicionais)
- [Instalação e Execução da Aplicação](#instalação-e-execução-da-aplicação)
- [Modelo de Dados Lógicos](#modelo-de-dados-lógicos)
- [Documentação da API](#documentação-da-api)
- [Screenshots da Aplicação](#screenshots-da-aplicação)
- [APIs Utilizadas](#apis-utilizadas)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Referências](#referências)
- [Agradecimentos](#agradecimentos)
- [Contato](#contato)
- [Autores](#autores)
- [Licença](#licença)

## Demonstração
Caso queira ver a aplicação em execução sem a necessidade de instalá-la em sua máquina local, acesse: https://wivenn.tests.wilsoncastro.dev

## Funcionalidades Implementadas
- Login e cadastro de usuários usando OAuth2;
- Confirmação de e-mail após a realização do cadastro;
- Busca de livros por título, autor e ISBN;
- Exibição da disponibilidade dos livros;
- Reserva de livros disponíveis;
- Atualização da disponibilidade do livro após a reserva;
- Exibição do prazo da retirada do livro após a reserva;
- Exibição todas as reservas efetuadas pelo usuário e as reservas canceladas;
- Cancelamento de reservas de livros para o usuário;
- Atualização da disponibilidade do livro após o cancelamento;
- Acesso a todas as reservas de livros para os bibliotecários;
- Cancelamento de reservas de livros para os bibliotecário;
- Notificações de novas reservas ou de cancelamentos de reservas para os bibliotecários;
- O usuário terá a opção de retirar o livro que reservou em um prazo máximo de até 7 dias úteis;
- O usuário pode reservar um número máximo de 5 livros simultaneamente;
- As notificações enviadas aos bibliotecários estão programadas para serem atualizadas a cada 5 segundos.

## Diferenciais Implementados
- No desenvolvimento front-end, foi utilizado o framework React para criar a interface;
- Foi utilizado o padrão de projeto Service para implementação das regras de negócio;
- Foi utilizado o padrão de projeto Repository para implementação das consultas ao banco de dados;
- Foi implementada a API do Google Books para facilitar a criação de Seeds de livros;
- O ambiente de desenvolvimento utilizado para o desenvolvimento do projeto foi o Docker e o Docker Compose;

## Informações Adicionais
- A autenticação foi implementada com OAuth2, utilizando a biblioteca Laravel Passport;
- O banco de dados utilizado no desenvolvimento do projeto foi o PostgreSQL;
- O projeto foi desenvolvido utilizando a arquitetura cliente e servidor, fazendo uso de uma API REST para a comunicação entre os dois;
- Não encontrei necessidade de usar o método "hasManyThrough" e "hasOneThrough" para o desenvolvimento do projeto;
- As configurações de filas para o processamento assíncrono do envio de emails foram realizadas utilizando o RabbitMQ;
- O controle de acesso do usuário e bibliotecário foi desenvolvido usando Spatie do Laravel;
- As notificações foram desenvolvidas utilizando o sistema de notificações do framework Laravel;
- Foram criados Seeders e Factories para facilitar a realização de testes; 
- Foram realizados testes unitários e de integração usando a framework PHP Unit para garantir a qualidade do código;
- Para o desenvolvimento do projeto, foi utilizado o Git com o fluxo de trabalho do GitFlow;
- Foi implementado um sistema simples de logs e tratamento de erros;
- Para o armazenamento das imagens dos livros, foi utilizado o Storage do Laravel;

## Instalação e Execução da Aplicação

#### Pré-requisitos
São necessários os seguintes requisitos instalados na máquina local para testar a aplicação:
- Docker
- Docker Compose

### Instalando e executando o projeto com o Docker
- Clone o repositório:

```bash
  git clone https://github.com/wilsoncastrodev/teste-fullstack-wivenn.git
```

- Em seguida, entre no diretório raiz do projeto utilizando o comando a seguir:

```bash
  cd teste-fullstack-wivenn
```
- Execute o seguinte comando para iniciar a execução dos containers do Docker:

```bash
  docker-compose up -d
```
- Caso o servidor esteja sendo executado pela primeira vez é necessário rodar o comando abaixo, para carregar as dependências e realizar as configurações necessárias para que aplicação funcione corretamente:

```bash
  docker exec -it wivenn-server-app-php bash ../server-init.sh
```
- Se a instalação tiver ocorrido normalmente, abra o navegador e execute a URL a seguir:

```bash
  http://localhost:3000
```

## Rodando os testes

- Para rodar os testes, rode o seguinte comando:

```bash
  docker exec -it wivenn-server-app-php php artisan test
```

## Testando e recebendo e-mails de confirmação no Mailtrap
#### Mailtrap
- O Mailtrap é um serviço que permite simular o envio de e-mails em um ambiente de teste, sem realmente enviar para os destinatários reais. Neste projeto o Mailtrap será usado para receber os e-mails de confimação dos usuários que realizarem o cadastro no site da biblioteca da Wivenn.

#### Após se registrar no site da biblioteca, você receberá um e-mail de confirmação na conta do Mailtrap
- Abra o navegador e digite o seguinte endereço: https://mailtrap.io/signin
- Na página de login do Mailtrap. Insira o e-mail e a senha a seguir: 

```bash
  Email: ririm89879@frandin.com
  Senha: wilsoncastro123
```

- Após fazer login, você será direcionado para o painel principal do Mailtrap. Procure pela caixa de entrada chamada "My Inbox" e clique nela.
- Dentro da caixa de entrada (My Inbox), você poderá visualizar o e-mail de confirmação que você recebeu após o cadastro no site da biblioteca.

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-11.png)
    
## Modelo de Dados Lógicos

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/database/imagem-1.png)

> Nota: Apesar de eu ter criado a tabela 'permissions' no banco de dados conforme solicitado no teste, eu acabei utilizando apenas a tabela ‘roles’. Eu optei por utilizar apenas controle de acesso baseado em funções por ser um projeto simples. O que permite gerenciar mais facilmente as permissões de acesso de cada usuário, além de simplificar o processo de autorização e autenticação.

## Documentação da API

### Autenticação de Usuários

#### Endpoints
| Método   | Rota       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `POST`      | `api/v1/register` | Registra um novo usuário |
| `POST`      | `api/v1/login` | Realiza o login do usuário |
| `POST`      | `api/v1/logout` | Realiza o logout do usuário autenticado |

#### Registra um novo usuário.

```
  POST /api/v1/register
```

Exemplo de Requisição:
```json
{
    "name": "Wilson Castro da Paixão",
    "email": "wilson@wivenn.com.br",
    "password": "wilsoncastro123",
    "role": "user"
}
```

Exemplo de Resposta:

```json
{
    "data": {
        "user": {
            "name": "Wilson Castro da Paixão",
            "email": "wilson@wivenn.com.br"
        }
    }
}
```

#### Realiza o login de um usuário

```
  POST /api/v1/login
```
Exemplo de Requisição:
```json
{
    "email": "bibliotecario1@wivenn.com.br",
    "password": "wilsoncastro123"
}
```


Exemplo de Resposta:

```json
{
    "data": {
        "user": {
            "name": "Bibliotecário 1",
            "email": "bibliotecario1@wivenn.com.br",
            "role": "librarian",
            "verified": true
        },
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNzc0YTAzMDIzMzNhMGQyMjc1ZThiNDU1YTcxZjk2YjQ2M2Y3Mzk0ZWJmMGZjYjlkZDk1NDNjOTkxNmUxNzQ3YzgzNTk1YTY4MWU3NzNlZTgiLCJpYXQiOjE3MDIzMjI4NzguNjUyNzMsIm5iZiI6MTcwMjMyMjg3OC42NTI3MzQsImV4cCI6MTczMzk0NTI3OC42MDgyMzksInN1YiI6IjMiLCJzY29wZXMiOltdfQ.T7OdSJWpDOYS7AOYUbHKdjODqA6Mi5cTv-kWhKB8Y8Fd7k74hxc1QawuSGsAeRP2zAKKDwYspJfzI4d7uHXCojppR8Ior25OgZ1LIqRffsFLjqrkg6fEky_rVvqoK1Ok0nrU70IgKEsvjvBui7ewc0bA_W0fmVKpj8smYvzk0Fz33n4aMkSix7jmixpY2ruCvwkWevGpu675DGscIVZQ2YXRsJXTF5fpMwxav2J4lVB6LvI9-xaAWlT4XfrkvbotmtDnmfyZWZdGq_S6k6JQXmNRbEke47i9vSgxlXgpijSJ-z7heLcg0ZHy0U6z3wQjv6bQD-CGnYCbdwlrUhTHSc-t51hvxyjsf-mdxnPmB_z9tC1MoYAUAqeUPXwVun-zP-S3WrYvrrLRvCKqfV_cZ_3H81bZ8-kYcS2gworPnZvINeLTZ5hix3TsNI8m7jLpmELglQt5Zw0T-u2jbEr9I6BUOGlbwqT6_ffMd1xxQQzHDOIladz-VSbZIgMJkLzMG0x7v4IFRrPjUNGEYC1733HO7LLl6I6lHmq0cB6p5TWnc06nndzQTGN7c8HglUy3DlFwM48YSu5bXhC9fqhKxEoZi9TsVs2FFrTjHZe0R-wzTmXy-mboKu2hx7_hlPg3v9CwG_kd1vKnzwMBF1XtfUQqvhvgKAUfR08lIIAZIgA"
    }
}
```

#### Realiza o logout do usuário autenticado

```
  POST /api/v1/logout
```

Permissões:

- O endpoint exige autenticação do usuário.
- O endpoint exige que o usuário possua a função de "Usuário" ou "Bibliotecário".
- O endpoint exige que o usuário esteja verificado.

Exemplo de Resposta:

```json
{
    "message": "Usuário deslogado com sucesso"
}
```

### Livros

#### Endpoints
| Método   | Rota       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `GET`      | `api/v1/books/paginate/{length}` | Lista todos os livros com paginação |
| `GET`      | `api/v1/books/search/{query}` | Pesquisa livros por título, autor, ISBN |
| `GET`      | `api/v1/books/reserved` | Lista os livros reservados pelo usuário |

#### Lista todos os livros com paginação

```
  GET /api/v1/books/paginate/{length}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `length`      | `integer` | **Obrigatório**. Número de livros por página. |

Permissões:

- O endpoint exige autenticação do usuário.
- O endpoint exige que o usuário possua a função de "Usuário".
- O endpoint exige que o usuário esteja verificado.

Exemplo de Resposta:

```json
{
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 3,
                "title": "PHP Programando com Orientação a Objetos - 4ª edição",
                "description": "O PHP é uma das linguagens mais utilizadas no mundo. Sua popularidade se deve à flexibilidade da linguagem e a um conjunto abrangente de classes e funções que permitem desde a criação de simples portais até complexas ...",
                "author": "Pablo Dall’Oglio",
                "cover": "http://localhost:8000/storage/books/covers/livro-php-programando-com-orientacao-a-objetos-4a-edicao-1702230557.jpg",
                "publisher": "Novatec Editora",
                "isbn": "9788575226919",
                "pages": 26,
                "is_available": 1,
                "created_at": "2023-12-10T17:46:53.000000Z",
                "updated_at": "2023-12-11T03:20:28.000000Z"
            },
        ],
        "first_page_url": "http://localhost:8000/api/v1/books/paginate/10?page=1",
        "from": 1,
        "last_page": 12,
        "last_page_url": "http://localhost:8000/api/v1/books/paginate/10?page=12",
        "next_page_url": "http://localhost:8000/api/v1/books/paginate/10?page=2",
        "path": "http://localhost:8000/api/v1/books/paginate/10",
        "per_page": 10,
        "prev_page_url": null,
        "to": 10,
        "total": 114
    }
}
```

#### Pesquisa livros por título, autor, ISBN

```
  GET /api/v1/books/search/{query}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `query`      | `string` | **Obrigatório**. String de busca. |

Permissões:

- O endpoint exige autenticação do usuário.
- O endpoint exige que o usuário possua a função de "Usuário".
- O endpoint exige que o usuário esteja verificado.

Exemplo de Resposta:

```json
{
    "data": [
        {
            "id": 3,
            "title": "PHP Programando com Orientação a Objetos - 4ª edição",
            "description": "O PHP é uma das linguagens mais utilizadas no mundo. Sua popularidade se deve à flexibilidade da linguagem e a um conjunto abrangente de classes e funções que permitem desde a criação de simples portais até complexas aplicações de negócios corporativas. O PHP é usado por experientes programadores, que utilizam o que há de mais poderoso em termos de orientação a objetos, padrões de projeto e frameworks, mas também por iniciantes...",
            "author": "Pablo Dall’Oglio",
            "cover": "http://localhost:8000/storage/books/covers/livro-php-programando-com-orientacao-a-objetos-4a-edicao-1702230557.jpg",
            "publisher": "Novatec Editora",
            "isbn": "9788575226919",
            "pages": 26,
            "is_available": 1,
            "created_at": "2023-12-10T17:46:53.000000Z",
            "updated_at": "2023-12-11T03:20:28.000000Z"
        },
    ]
}
```

#### Lista os livros reservados pelo usuário

```
  GET /api/v1/books/reserved
```

Permissões:

- O endpoint exige autenticação do usuário.
- O endpoint exige que o usuário possua a função de "Usuário".
- O endpoint exige que o usuário esteja verificado.

Exemplo de Resposta:

```json
{
    "data": [
        {
            "id": 3,
            "title": "PHP Programando com Orientação a Objetos - 4ª edição",
            "description": "O PHP é uma das linguagens mais utilizadas no mundo. Sua popularidade se deve à flexibilidade da linguagem e a um conjunto abrangente de classes e funções que permitem desde a criação de simples portais até complexas aplicações de negócios corporativas. O PHP é usado por experientes programadores, que utilizam o que há de mais poderoso em termos de orientação a objetos, padrões de projeto e frameworks, mas também por iniciantes...",
            "author": "Pablo Dall’Oglio",
            "cover": "http://localhost:8000/storage/books/covers/livro-php-programando-com-orientacao-a-objetos-4a-edicao-1702230557.jpg",
            "publisher": "Novatec Editora",
            "isbn": "9788575226919",
            "pages": 26,
            "is_available": 1,
            "created_at": "2023-12-10T17:46:53.000000Z",
            "updated_at": "2023-12-11T03:20:28.000000Z"
        },
    ]
}
```

### Reservas

#### Endpoints
| Método   | Rota       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `POST`      | `api/v1/reservations` | Cria reserva de livros |
| `PATCH`      | `api/v1/books/search/{query}` | Cancelar reserva do livro |
| `GET`      | `api/v1/reservations` | Lista todas as reservas de livros |

#### Cria reserva de livros

```
  POST /api/v1/reservations
```

Permissões:

- O endpoint exige autenticação do usuário.
- O endpoint exige que o usuário possua a função de "Usuário".
- O endpoint exige que o usuário esteja verificado.

Exemplo de Requisição:
```json
{
    "book_id": 1
}
```

Exemplo de Resposta:

```json
{
    "data": {
        "id": 116,
        "due_date": "2023-12-19",
        "status": "Reservado",
        "created_at": "2023-12-11T20:42:29.000000Z",
        "updated_at": "2023-12-11T20:42:29.000000Z",
        "book": {
            "id": 1,
            "title": "JavaScript",
            "description": "JavaScript é a linguagem de programação da Web. A maioria dos sites modernos usa JavaScript, e todos os navegadores – em computadores de mesa, consoles de jogos, tablets e smartphones – incluem interpretadores JavaScript. Isso a torna uma das linguagens de programação mais importantes atualmente e uma das tecnologias que todo desenvolvedor Web deve conhecer. Referência completa para programadores, JavaScript...",
            "author": "David Flanagan",
            "cover": "http://localhost:8000/storage/books/covers/livro-javascript-1702230412.jpg",
            "publisher": "Bookman Editora",
            "isbn": "9788565837484",
            "pages": 1080,
            "is_available": 0,
            "created_at": "2023-12-10T17:46:52.000000Z",
            "updated_at": "2023-12-11T20:42:29.000000Z"
        },
        "user": {
            "id": 1,
            "name": "Usuário 1",
            "email": "usuario1@wivenn.com.br",
            "email_verified_at": "2023-12-10T17:52:05.000000Z",
            "created_at": "2023-12-10T17:52:06.000000Z",
            "updated_at": "2023-12-10T17:52:06.000000Z"
        }
    }
}
```

#### Cancelar reserva do livro

```
  PATCH /api/v1/reservations/{reservation}/cancel
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `reservation`      | `integer` | **Obrigatório**. O ID da reserva. |

Permissões:

- O endpoint exige autenticação do usuário.
- O endpoint exige que o usuário possua a função de "Usuário" ou "Bibliotecário.
- O endpoint exige que o usuário esteja verificado.

Exemplo de Resposta:

```json
{
    "data": {
        "id": 116,
        "due_date": "2023-12-19",
        "status": "Cancelado",
        "book_id": 1,
        "created_at": "2023-12-11T20:42:29.000000Z",
        "updated_at": "2023-12-11T20:48:19.000000Z",
        "book": {
            "id": 1,
            "title": "JavaScript",
            "description": "JavaScript é a linguagem de programação da Web. A maioria dos sites modernos usa JavaScript, e todos os navegadores – em computadores de mesa, consoles de jogos, tablets e smartphones – incluem interpretadores JavaScript. Isso a torna uma das linguagens de programação mais importantes atualmente e uma das tecnologias que todo desenvolvedor Web deve conhecer. Referência completa para programadores, JavaScript...",
            "author": "David Flanagan",
            "cover": "http://localhost:8000/storage/books/covers/livro-javascript-1702230412.jpg",
            "publisher": "Bookman Editora",
            "isbn": "9788565837484",
            "pages": 1080,
            "is_available": 1,
            "created_at": "2023-12-10T17:46:52.000000Z",
            "updated_at": "2023-12-11T20:48:19.000000Z"
        },
        "user": {
            "id": 1,
            "name": "Usuário 1",
            "email": "usuario1@wivenn.com.br",
            "email_verified_at": "2023-12-10T17:52:05.000000Z",
            "created_at": "2023-12-10T17:52:06.000000Z",
            "updated_at": "2023-12-10T17:52:06.000000Z"
        }
    }
}
```

#### Lista todas as reservas de livros

```
  GET /api/v1/reservations
```

Permissões:

- O endpoint exige autenticação do usuário.
- O endpoint exige que o usuário possua a função de "Bibliotecário".
- O endpoint exige que o usuário esteja verificado.

Exemplo de Resposta:

```json
{
    "data": [
        {
            "id": 117,
            "due_date": "2023-12-19",
            "status": "Cancelado",
            "book_id": 1,
            "created_at": "2023-12-11T20:54:15.000000Z",
            "updated_at": "2023-12-11T20:54:27.000000Z",
            "book": {
                "id": 1,
                "title": "JavaScript",
                "description": "JavaScript é a linguagem de programação da Web. A maioria dos sites modernos usa JavaScript, e todos os navegadores – em computadores de mesa, consoles de jogos, tablets e smartphones – incluem interpretadores JavaScript. Isso a torna uma das linguagens de programação mais importantes atualmente e uma das tecnologias que todo desenvolvedor Web deve conhecer. Referência completa para programadores, JavaScript...",
                "author": "David Flanagan",
                "cover": "http://localhost:8000/storage/books/covers/livro-javascript-1702230412.jpg",
                "publisher": "Bookman Editora",
                "isbn": "9788565837484",
                "pages": 1080,
                "is_available": 1,
                "created_at": "2023-12-10T17:46:52.000000Z",
                "updated_at": "2023-12-11T20:54:27.000000Z"
            },
            "user": {
                "id": 1,
                "name": "Usuário 1",
                "email": "usuario1@wivenn.com.br",
                "email_verified_at": "2023-12-10T17:52:05.000000Z",
                "created_at": "2023-12-10T17:52:06.000000Z",
                "updated_at": "2023-12-10T17:52:06.000000Z"
            }
        },
    ]
}
```

### Notificações

#### Endpoints
| Método   | Rota       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `GET`      | `api/v1/notifications/reservations/librarian` | Lista todas as notificações de reservas |



#### Lista todas as notificações de reservas para o bibliotecário

```
  GET /api/v1/notifications/reservations/librarian
```

Permissões:

- O endpoint exige autenticação do usuário.
- O endpoint exige que o usuário possua a função de "Bibliotecário".
- O endpoint exige que o usuário esteja verificado.

Exemplo de Resposta:

```json
{
    "data": [
        {
            "id": "2d487d28-d688-4fb5-86f0-341680eda85b",
            "type": "App\\Notifications\\NotificationReservation",
            "notifiable_type": "App\\Models\\User",
            "notifiable_id": 3,
            "data": {
                "message": "O usuário <strong>Usuário 1</strong> cancelou a reserva do livro <strong>JavaScript</strong> no dia <strong>11 de dezembro de 2023</strong>.",
                "subject": "Reserva Cancelada"
            },
            "read_at": null,
            "created_at": "2023-12-11T20:54:27.000000Z",
            "updated_at": "2023-12-11T20:54:27.000000Z"
        },
    ]
}
```


## Screenshots da Aplicação


![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-animada-2.gif)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-animada-3.gif)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-animada-4.gif)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-animada-5.gif)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-animada-6.gif)
![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-animada-7.gif)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-animada-1.gif)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-1.png)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-3.png)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-2.png)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-4.png)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-5.png)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-6.png)
![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-7.png)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-8.png)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-9.png)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-10.png)

![App Screenshot](https://github.com/wilsoncastrodev/teste-fullstack-wivenn/blob/feature/ajustes-finais/server-app/public/images/app/imagem-11.png)


## APIs Utilizadas

- [Google Books API](https://www.googleapis.com/books)

## Tecnologias Utilizadas

| Tecnologia | Versão
| :---: | :---: |
| PHP| 8.x |
| Laravel | 10.x |
| Postgres | 15.x |
| pgAdmin | 4.x |
| Nginx | 1.x |
| Javascript | - |
| Typescript | 5.x |
| React | 18.x |
| Redux | 4.x |
| HTML5 | - |
| CSS3 | - |
| SASS | 1.x |
| Bootstrap | 5.x |
| Docker (Docker Compose) | 23.x |
| APIs REST/RESTful | - |
| Git | - |


## Referências
 - [Documentação do Laravel](https://laravel.com/docs/10.x/)
 - [Documentação do React](https://pt-br.reactjs.org/)

## Agradecimentos
Quero agradecer à equipe da Wivenn por me dar a oportunidade de participar do desenvolvimento deste projeto. Este projeto me ajudou a melhorar ainda mais minhas habilidades em Laravel. Muito obrigado a todos que me deram essa oportunidade. Que Deus possa abençoar a todos da Wivenn.

## Contato
Qualquer coisa, sinta-se à vontade para entrar em contato comigo pelo e-mail contato@wilsoncastro.dev.

## Autores
- [@wcastro](https://github.com/wilsoncastrodev)

## Licença
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
