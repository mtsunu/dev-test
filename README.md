## Requirements
- tested on `PHP 7.4`

## Installation

1. git clone
2. composer install
3. run `php artisan key:generate`
4. run `php artisan jwt:secret`
5. tambahkan entry `SENTRY_LARAVEL_DSN` ke file .env. ambil dari sentry
6. tambahkan entry `L5_SWAGGER_CONST_HOST` ke file .env. isi dengan base api url (cth: http://localhost:8000/api)
7. setting database
8. buat user baru pakai tinker: ` User::create(['email' => 'mukidi@gmail.com', 'password' => Hash::make('qwerty'), 'name' => 'Mukidi']);`
9. run `php artisan migrate`
10. run `php artisan serve`

