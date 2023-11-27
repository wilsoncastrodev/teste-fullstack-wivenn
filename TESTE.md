# WIVENN - UNIÃO DE CONHECIMENTOS | PROJETO PHP/LARAVEL: APLICAÇÃO DE RESERVAS DE LIVROS EM BIBLIOTECA

## Objetivo

A aplicação de Reservas de Livros em Biblioteca permite que utilizadores (leitores e bibliotecários) gerenciem o processo de reserva de livros online. O sistema oferece funcionalidades que incluem cadastro e autenticação de usuários, pesquisa de livros, realização e cancelamento de reservas, notificações para bibliotecários e gerenciamento centralizado das reservas dos usuários.

### Funcionalidades para Utilizadores:

- Autenticação: Cadastro e login seguros com opcional de OAuth2 para facilitar o acesso;
- Pesquisa de Livros: Possibilidade de buscar títulos por diversas categorias e verificar a
disponibilidade em tempo real;
- Reserva de Livros: Funcionalidade para reserva online, com confirmação e informação sobre
prazo de retirada;
- Gerenciamento de Reservas: Visualização e cancelamento de reservas efetuadas pelo
usuário.

### Funcionalidades para Bibliotecários:
- Notificações de Reservas: Alertas de novas reservas ou cancelamentos, para
acompanhamento efetivo;
- Administração de Reservas: Acesso a todas as informações de reserva para gerenciamento
proativo.

## Histórias de Usuários
### História de Usuário 1: Cadastro e Autenticação
Como um novo visitante, eu quero me cadastrar no sistema da biblioteca e autenticar usando
OAuth2, para que eu possa reservar livros online.
#### Critérios de Aceitação:
- O usuário deve poder se registrar com um endereço de email e senha ou usando uma
autenticação OAuth2.
- O usuário deve receber uma confirmação por email após o cadastro.
- O usuário deve ser capaz de entrar no sistema usando suas credenciais ou conta OAuth2
ligada.
### História de Usuário 2: Procurar Livros
Como um usuário logado, eu quero pesquisar livros disponíveis na biblioteca, para que eu possa
encontrar títulos que me interessam e verificar a sua disponibilidade.
#### Critérios de Aceitação:
- Deve haver uma funcionalidade de pesquisa que permita ao usuário procurar por título, autor,
ou ISBN.
- Os resultados da pesquisa devem incluir informações sobre a disponibilidade do livro.
### História de Usuário 3: Reservar um Livro
Como um usuário autenticado, eu quero ser capaz de reservar um livro disponível, para poder
pegá-lo na biblioteca em uma data e hora conveniente para mim.
#### Critérios de Aceitação:
- O usuário deve ser capaz de selecionar um livro a partir dos resultados da pesquisa e
realizar uma reserva.
- O sistema deve confirmar a reserva e informar ao usuário a data até a qual o livro será
mantido para ele.
- Deve haver uma limitação no número de reservas ativas que um usuário pode ter.
### História de Usuário 4: Cancelar Reserva
Como um usuário que reservou um livro, eu quero cancelar minha reserva, para que o livro possa ser
disponibilizado para outros usuários.
#### Critérios de Aceitação:
- O usuário deve ser capaz de acessar suas reservas atuais e cancelar qualquer uma delas.
- O sistema deve atualizar o status de disponibilidade do livro após o cancelamento da
reserva.
### História de Usuário 5: Notificações de Reserva
Como bibliotecário, eu quero receber notificações sobre novas reservas, para que eu possa
gerenciar as reservas de livros de forma eficiente.
#### Critérios de Aceitação:
- Cada reserva nova ou cancelada deve gerar uma notificação que será visualizada pelos
bibliotecários.
- As notificações devem incluir os detalhes relevantes da reserva.
### História de Usuário 6: Gerenciamento de Reservas
Como bibliotecário, eu quero acessar e gerenciar as reservas de usuários, Para que eu possa
assegurar que os livros sejam corretamente aplicados e que as regras da biblioteca sejam seguidas.
#### Critérios de Aceitação:
- Os Bibliotecários devem ter permissão para visualizar todas as reservas ativas e passadas.
- Deve ser possível modificar ou cancelar reservas em nome dos usuários, se necessário.

## Entidades do Banco de Dados
1. Usuários e Bibliotecários (Users)
2. Papéis (Roles)
3. Permissões (Permissions)
4. Livros (Books)
5. Reservas (Reservations)

As entidades Reservas devem ter uma relação HasManyThrough com a entidade Livros, passando
pela entidade Usuários.

## Requisitos Técnicos (Ordenados do Mais Essencial ao Mais
Supérfluo)
1. OAuth2 Authentication: Implementação da autenticação via OAuth2 com Laravel Passport.
2. PostgreSQL: Uso de PostgreSQL como banco de dados.
3. DB Transactions: Gestão de transações do banco de dados para garantir a consistência
durante as operações CRUD.
4. JSON APIs: Desenvolver uma API REST seguindo as melhores práticas e padrões de JSON.
5. Model Relationships: Utilizar HasManyThrough e HasOneThrough onde for relevante.
6. Filas e Emails: Configuração de filas para processamento assíncrono de envio de emails.
7. Schedulers e Notifications: Implementar schedulers para tarefas periódicas e sistema de
notificações.
8. ACL com Spatie Laravel Permissions: Estabelecer controle de acesso usando o pacote
Spatie.
9. Factories e Seeders: Criar dados fictícios para testes usando factories e seeders.
10. Testes Unitários e de Integração: Escrever testes que cobrem diferentes camadas da
aplicação.
11. Git com Git Flow: Uso correto do Git com a estratégia de branching do Git Flow.
12. Semantic Versioning: Versionamento semântico do código da aplicação.
13. Documentação com PHPDoc: Documentar classes, métodos e propriedades usando
PHPDoc.
14. 12 Factors: Aplicar as metodologias dos 12 fatores sempre que possível.
15. Logging e Error Handling: Implementar um sistema de logs e tratamento de erros.
16. Storages: Gerenciamento de arquivos utilizando storage local.