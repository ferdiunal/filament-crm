# filament-crm 

Utilizing the [Laravel Framework](https://github.com/laravel/laravel) and [Filament TallKit](https://github.com/filamentphp/filament), a modular CRM application has been developed based on [multi-tenancy](https://github.com/archtechx/tenancy).

## Usage:

1. Clone the repository:

```bash
git clone git@github.com:ferdiunal/filament-crm.git
```

2. Copy the example environment file:

```bash
cp .env.example .env
```

3. Install the dependencies:

```bash
composer install
```

4. Create a new module:

```bash
php artisan crm:modules:create ModuleName
```

5. Migrate the modules:

```bash
php artisan crm:modules:migrate
``` 