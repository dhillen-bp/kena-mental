# KenaMental-Online Consultation Booking System
kenamental is a dummy/fake online psychologist consultation booking service web platform with [Laravel 10](https://laravel.com/docs/10.x/releases).

## 🚀Installation

Here are the steps to install and run the project in your local environment:

1. Clone the repository: `git clone https://github.com/dhillen-bp/kena-mental.git`
2. Copy `.env.example` to `.env` and configure the settings.
3. Run: `composer install`
4. Migrate the database: `php artisan migrate`
5. Run the seeder: `php artisan db:seed`

## 📌Usage

Here's how to run and use the project:

1. Run the local server: `php artisan serve`
2. Open your browser and visit: `http://localhost:8000`
3. For admin using prefix route /admin `http://localhost:8000/admin`
4. To run the payment gateway you must go through the https protocol, if on localhost you can use ngrok and run it: `ngrok http 8000`
5. For configuration details on midtrans can be seen here: `https://docs.midtrans.com/docs/snap-preparation`

## 🔑Key Features

### Feature Client
- **Google Authentication with Laravel Socialite**
- **Booking Online Consultation**
- **Psychology Test**
### Feature Admin
- **User Management**
- **Psychologist Management**
- **Consultation Management**
- **Admin Management**

## ©️License

This project is licensed under the [MIT License](https://opensource.org/license/mit/).
