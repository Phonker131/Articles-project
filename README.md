# Articles — PHP Web Application

An educational article management application built with PHP and MySQL. It uses a custom router, a controller, database models, and server-rendered templates.

## Features
- List and view articles.
- Create, edit, and delete articles.
- Search article titles and content.
- Access the database using MySQLi prepared statements for parameterized operations.

## Stack
PHP, MySQL/MariaDB, MySQLi, HTML, CSS, JavaScript.

## Local setup
1. Clone this repository into a local PHP web server directory, for example XAMPP's `htdocs/Articles`.
2. Enable PHP's `mysqli` extension and start MySQL/MariaDB.
3. Create a local database and import [articles.sql](articles.sql).
4. Set your local connection values in `config/db_config.php`.
5. Check `config/project_config.php`: the current base path is `/Articles`.
6. Configure the web server to route application requests through `index.php`, then open `http://localhost/Articles/articles`.

The repository does not include a complete web-server rewrite configuration. Routing setup depends on the chosen server.

## Project structure
| Path | Purpose |
| --- | --- |
| `index.php`, `dispatcher.php`, `router.php` | Request dispatch and routing |
| `actions/` | Supported routes and methods |
| `controllers/` | Article request handlers |
| `models/` | Article entities and database access |
| `templates/` | Server-rendered pages |
| `static/` | CSS and browser JavaScript |
| `config/` | Database and base-path configuration |

## Scope
This is a learning project demonstrating request routing and database-backed CRUD. Production deployment requires a separate review of authentication, authorization, CSRF protection, input handling, and error reporting. Local startup has not been verified as part of this documentation update.

## License
See [LICENSE](LICENSE).
