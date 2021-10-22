## Requirements
- tested on `PHP 7.4`

## Installation

1. git clone
2. composer install
3. copy file `.env.example` ke `.env`
4. run `php artisan key:generate`
5. run `php artisan jwt:secret`
6. tambahkan entry `SENTRY_LARAVEL_DSN` ke file .env. ambil dari sentry
7. tambahkan entry `L5_SWAGGER_CONST_HOST` ke file .env. isi dengan base api url (cth: http://localhost:8000/api)
8. setting database
9. buat user baru pakai tinker: ` User::create(['email' => 'mukidi@gmail.com', 'password' => Hash::make('qwerty'), 'name' => 'Mukidi']);`
10. run `php artisan migrate`
11. run `php artisan serve`

