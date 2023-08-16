# back-end-magazord
Teste para vaga de Desenvolvedor Back-end

Necessário realizar a instalação dos seguintes sistemas:
- PHP 8.2.9 (https://www.php.net/downloads)
- PostgreSQL 15.4 (https://www.postgresql.org/download/)
- Composer (https://getcomposer.org/download/)
- GIT (https://git-scm.com)

Após a instalação, torna-se necessário realizar a configuração do composer dentro do projeto:
- composer install
- composer init (Configurar o namespace para "Will/Project")
- composer require doctrine/orm
- composer require symfony/cache
- composer require doctrine/annotations


Também é necessário realizar a configuração do arquivo Config (\src\controller\Config.php), alterando a configuração do database conforme utilizado.

Com o banco de dados configurado, é necessário realizar a configuração/criação das tabelas, através do comando:
- php vendor/bin/doctrine orm:schema-tool:create
