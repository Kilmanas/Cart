# Test Assignment

Assignment is based on [Symfony 6](https://symfony.com/doc/current/index.html) framework.
In order to run the project locally, install [PHP8](https://www.php.net/manual/en/install.php),
[Symfony CLI](https://symfony.com/download), [Composer](https://getcomposer.org/download/) and run
the following commands:

```bash
composer install
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
symfony server:start --no-tls -d
symfony open:local # Opens the assignment description page
```

The project uses the [SQLite](https://sqlite.org/) database by default, stored at `var/data.db` path.
Do not commit the DB file to the repository (whole `var` folder is in `.gitignore`), all changes to
the database schema and data must be done using Doctrine's migrations and fixtures.
