# Texugo Blog

![Captura de tela de 2020-03-05 01-55-57](https://user-images.githubusercontent.com/49793812/75949318-9a8f5480-5e84-11ea-957d-9fa897f0e881.png)

## Sobre esse projeto

> Ensinar é aprender duas vezes. - *Joseph Joubert*

Surgiu como uma ideia para testar os conhecimentos em Laravel, uma auto aprendizagem que posteriormente ajudará a mais
desenvolvedores iniciantes a sanar suas dúvidas.

## Por quê?

De nada adiantará um conhecimento que não vai além da sua mente. Por isso essa criação, para expor o andamento da codificação e posteriormente a publicação de posts voltados ao desenvolvimento web. Esse blog faz parte do meu portfólio, se alguém puder enviar algum feedback, ficarei muito feliz.

**Meu email -** andersonmorize@gmail.com

## Funcionalidades

- Login / Cadastro.

- Diferenciação de cliente / administrador

- Feed de postagem dinâmico

- Exibição de post único

- Seleção por tags

- Pesquisa por título de postagem

- Área de administração
    - CRUD de usuarios
    - CRUD de postagens
    - CRUD de tags
    
## Observações sobre esse projeto

- Ainda apresenta uma limitação na nomeclatura das imagens upadas.
- Para definir o primeiro administrador do blog, é necessario alterar o atributo *is_admin* diretamente no banco de dados.

## Instalação

Quando o projeto foi clonado, algumas pastas essenciais para execução não foram incorporadas. Como o *.env* e o diretório *vendor*. Para executar a aplicação é necessário rodar alguns comandos.
Já dentro do diretório clonado, execute.

```composer install``` - Instala as dependências

```cp .env.example .env``` - Cria o arquivo *.env*. Faça as edições no .env recém criado. Como nome do banco de dados a ser utilizado.

```php artisan key:generate``` - Gera a chave do aplicativo

```php artisan migrate``` - Executa as migrations
