# Instalasi aplikasi

Clone this project

```bash
git clone https://github.com/OkkyRoyDirgantara/chatbot-laravel.git
```

Install composer dependencies

```bash
composer install
```

copy and configuration .env

```bash
cp .env.example .env
```

Generate key

```bash
php artisan key:generate
```

Run migration

```bash
php artisan migrate
```

Run seed

```bash
php artisan db:seed
```
