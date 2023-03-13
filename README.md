
# REABOOK

Reabook Ecommerce is an online platform that offers a wide selection of original and imported books. Build by Laravel 7.


## Installation

1. Extract the file to your web server.
2.  Install the required dependencies using Composer
```bash
  composer install
```
3. Make a copy of the .env.example file and rename it to .env
4. Generate a new application key:
```bash
  php artisan key:generate
```
5. Open the .env file in a text editor and update the database connection settings with your own database credentials
6. Run the database migrations with the seed
```bash
  php artisan migrate --seed
```