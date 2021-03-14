# How To's

## Get ready for Cake (from scratch)

1) Install [XAMPP](https://www.apachefriends.org/download.html) (or `choco install xampp-74`)
2) Install [Composer](https://getcomposer.org/download/)
3) Uncomment `extension=intl` in `php.ini`
4) Create CakeProject (run in xampp/htdocs `composer create-project --prefer-dist cakephp/app:4.* [AppName]`)
5) Create Debug Database `debug_kit_[AppName]`
6) Configure `config/app.php` and `config/app_local.php`
    ```PHP
    // More configuration above.
    'Datasources' => [
        'default' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Mysql',
            'persistent' => false,
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => '[DatabaseName]',
            'encoding' => 'utf8mb4',
            'timezone' => 'UTC',
            'cacheMetadata' => true,
        ],
        'debug_kit' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Mysql',
            'persistent' => false,
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'debug_kit_[DatabaseName]',
            // Comment out the line below if you are using PostgreSQL
            'encoding' => 'utf8mb4',
            'timezone' => 'UTC',
            'cacheMetadata' => true
        ],
    ];
    ```
7) Run bake commands 
   - `bin/cake bake model all`
   - `bin/cake bake template all`
   - `bin/cake bake controller all`

## Software
- [Chocolatey](https://chocolatey.org/install)
- [Wrokbench 6.3.8](https://downloads.mysql.com/archives/workbench/)
- [Visual Studio Code](https://code.visualstudio.com/download)

## Chocolatey
- Git -> `choco install git`
- XAMPP 7.4 -> `choco install xampp-74`

## VS Code Extensions
- PHP Intelephese
- PHP IntelliSense
- PHP Debug
- CakePHP Snippets
- IntelliJ IDEA Keybindings