# Cornelia

This is library app. Staff can add books and users. Everyone else can borrow a book, return it, and look up what they still have out.

It runs on Laravel 10, PHP 8.1, and MySQL. The pages are Blade templates.

## Run it

You need PHP 8.1, Composer, MySQL, and Node.

```bash
git clone https://github.com/c-ent/Cornelia.git
cd Cornelia
composer install
npm install
cp .env.example .env
```

On Windows, use `copy .env.example .env` instead of `cp`.

Create a MySQL database named `librarysys` (that is the name in `.env.example`), or change `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` to match a database you already have.

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed --class=roles
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed
npm run dev
php artisan serve
```

Seed roles before users. `php artisan db:seed` only adds the sample books.

Open http://localhost:8000.

These accounts are created by the user seeder. The password for each one is `1`.

| Email | Role |
| --- | --- |
| superadmin@gmail.com | superadmin |
| admin@gmail.com | admin |
| user@gmail.com | user |

Login sends a superadmin to `/superadmin`, an admin to `/admin`, and a user to `/user`.

## Who can do what

Superadmins and admins manage users, the book catalog, and borrow records. An admin can only assign the user role when creating an account. A superadmin can assign admin or user.

A normal account can open the catalog, borrow a copy, return it, and see their own history. Borrowing stops when they hit their borrowing limit. New users start at 10.

## Pages

- `/` home
- `/login`, `/register`
- `/books` catalog, `/book/{id}` one book
- `/books/borrowhistory` the signed-in user's loans
- `/manage/users`, `/manage/books`, `/manage/bbh` staff tools
- `/manage/borrowed`, `/manage/returned` lists split by status
