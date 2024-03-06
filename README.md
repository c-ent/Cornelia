# Project Setup Instructions

Follow these steps to set up the project:

1. **Install Dependencies:** Use the command `composer install` to install the necessary dependencies.

2. **Environment Setup:** Copy the example environment file to create your own. Use the command `cp .env.example .env`.

3. **Generate Application Key:** Generate a unique key for your application with `php artisan key:generate`.

4. **Database Migration:** Create the database tables by running `php artisan migrate`.

5. **Seed Roles:** Populate the Roles table with `php artisan db:seed Roles`.

6. **Seed Users:** Populate the Users table with `php artisan db:seed UsersTableSeeder`.

7. **Start Server:** Start the Laravel development server with `php artisan serve`.

8. **Access Application:** Open your web browser and go to `localhost:8000` to access the application.