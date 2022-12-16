# API de Usuários em PHP

## Como iniciar?

1. Habilite a extensão `extension=pdo_sqlite`, para isso retire o `;` do trecho `;extension=pdo_sqlite` no arquivo `php.ini` que se encontra no diretório de instalação do PHP. 
2. Suba um servidor web local, para isso, com o projeto aberto, no terminal digite o seguinte comando: `php -S localhost:8080`
3. Acesse no seu navegador a seguinte url: `http://localhost:8080/`
4. Acesse as seguintes rotas:
* http://localhost:8080/  - Página inicial da API
* http://localhost:8080/usuarios - Retorna todos os usuários cadastrados no banco de dados
* http://localhost:8080/usuarios?pagina=1 - Retorna os usuários na página 1. **Obs: Pode ser acessado página 2, 3...**
* http://localhost:8080/usuarios?grupo=1 - Retorna os usuários que pertêncem ao grupo 1. **Obs: Grupo 1 e 2**
* Se for acessado uma rota não definida, será retornado a mensagem: "Nenhuma rota encontrada"
