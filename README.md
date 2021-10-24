## Instruções pós download/clone

- Rodar o comando no terminal: ``composer update``
- Verificar credenciais de acesso a base de dados no arquivo: ``app/Infrastructure/Persistence/ConnectionCreator.php``
- Inicializar o servidor de banco de dados.
- Importar a base de dados ``php_test``
- Inicializar a aplicação rodando o comando: ``php -S localhost:8000 -t public``
