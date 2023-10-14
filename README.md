# Laravel Subscription Platform

The Laravel Subscription Platform is a simple subscription management system that allows users to subscribe to websites and receive email notifications when new posts are published on those websites.

## Prerequisites

- PHP 7.* or 8.*
- Composer
- MySQL database
- Laravel 8 (or compatible version)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/musman2002/SubscriptionPlatform.git
   ```

2. Change to the project directory:
   ```bash
   cd SubscriptionPlatform
   ```

3. Install composer dependencies:
   ```bash
   composer install
   ```

4. Copy the `.env.example` file to `.env` and configure your database and email settings.

5. Generate the application key:
   ```bash
   php artisan key:generate
   ```

6. Run the database migrations:
   ```bash
   php artisan migrate
   ```

7. Start the Laravel development server:
   ```bash
   php artisan serve
   ```

8. Visit the application in your browser at `http://localhost:8000`.

## Seeded Data

Seeded data for websites and users has been added to make it easier to test and use the system. You can customize the seeded data in the database seeders.
   ```bash
    php artisan db:seed --class=WebsiteSeeder
    php artisan db:seed --class=UserSeeder
    php artisan db:seed --class=SubscriptionSeeder
   ```
## Endpoints

- `POST /api/websites/posts` - Create a post for a specific website.
- `POST /api/websites/subscribe` - Subscribe to a website.

## Postman Collection

To explore and test the available APIs, import the Postman collection from the following link:
[Postman Collection](https://api.postman.com/collections/29430558-e05f07d7-e336-4c4c-85a9-550fce21c281?access_key=PMAT-01HCQC0H57V0K6A5VF6MQB9TTH)

## Database Configuration

The Laravel Subscription Platform uses a MySQL database for storing application data. To configure your database settings, update the `.env` file with your database connection details:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

## Queue Connection
The application uses Laravel's built-in queue system for background job processing. To configure your queue connection, update the .env file with your desired queue driver:

```env
QUEUE_CONNECTION=redis
```

## Email Configuration
The Laravel Subscription Platform uses Laravel's email system to send notifications to subscribers. To configure your email settings, update the .env file with your email provider's details. Here's an example for sending emails via SMTP:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your_email@example.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
```