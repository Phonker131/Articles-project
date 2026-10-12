# Articles — PHP Web Application

An educational article management application built with PHP and MySQL. It uses a custom router, a controller, database models, and server-rendered templates.

## Features
- List and view articles.
- Create, edit, and delete articles.
- Search article titles and content.
- Access the database using MySQLi prepared statements for parameterized operations.

## Stack
PHP, MySQL/MariaDB, MySQLi, HTML, CSS, JavaScript.

## Local development prerequisites
- PHP with the `mysqli` extension and MySQL/MariaDB.
- A local database initialized from [articles.sql](articles.sql).
- Local database settings in `config/db_config.php`.

## Current setup limitations
This is an earlier university project. Before running it, align the application paths: `config/project_config.php` currently uses `/Articles`, browser requests in `static/js/javascript.js` use a university-server path, and `dispatcher.php` uses fixed URL-segment positions. The repository also does not contain an Apache rewrite configuration.

A one-command setup is not available yet. These routing settings need to be made consistent for the chosen local server before the CRUD flow can be evaluated.

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
