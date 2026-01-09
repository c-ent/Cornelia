# Library Management System 📚

A comprehensive web-based Library Management System built with Laravel 10, designed to streamline library operations including book management, user management, and borrowing history tracking.

## Features

**Book Management**: Add, edit, view, and delete books with complete details including title, author, ISBN, description, and available copies.

**User Management**: Complete CRUD operations for users with role assignment and borrowing limit enforcement.

**Borrow History Tracking**: Monitor all borrowed and returned books with dates, status tracking, and complete transaction history.

**Role-Based Access Control**: Three-tier user system with SuperAdmin, Admin, and User roles, each with specific permissions.

**Authentication System**: Secure login and registration with Laravel Sanctum.

### User Roles

**SuperAdmin** - Full system access including user management, book management, borrow history management, and all administrative dashboards.

**Admin** - User management, book management, borrow history management, and ability to view all borrowed/returned books.

**User** - Browse available books, borrow and return books, view personal borrowing history with enforced borrowing limits.

## Tech Stack

- **Framework**: Laravel 10.48
- **PHP**: 8.1 or higher
- **Authentication**: Laravel Sanctum
- **Frontend**: Blade Templates, Vite
- **Database**: MySQL
- **Additional**: Guzzle HTTP Client, Laravel Tinker, Carbon

## Getting Started

### Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL or compatible database
- Node.js and npm

### Installation

1. Clone the repository:
```bash
git clone https://github.com/c-ent/LibraryManagementSystem_Laravel.git
cd LibraryManagementSystem_Laravel
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Set up environment variables:
```bash
cp .env.example .env
```

Update the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Run database migrations:
```bash
php artisan migrate
```

6. Seed the database:
```bash
# Seed roles first (required for users)
php artisan db:seed --class=roles

# Seed users
php artisan db:seed --class=UsersTableSeeder

# Seed books (or use DatabaseSeeder which includes BooksTableSeeder)
php artisan db:seed
```

**Default Users Created:**
- SuperAdmin: `superadmin@gmail.com` / Password: `1`
- Admin: `admin@gmail.com` / Password: `1`
- User: `user@gmail.com` / Password: `1`

7. Compile frontend assets:
```bash
npm run dev
```

8. Start the development server:
```bash
php artisan serve
```

9. Access the application at `http://localhost:8000`

## Development Commands

### Creating Models and Migrations
```bash
# Create a new model
php artisan make:model ModelName

# Create a new migration
php artisan make:migration migration_name

# Run migrations
php artisan migrate
```

### Hashing Passwords
```bash
# Open Tinker
php artisan tinker

# Generate password hash
echo Hash::make('your_password_here')
```

### Running Tests
```bash
php artisan test
```

## Database Structure

**Tables:**
- `users` - User accounts with role assignment and borrowing limits
- `roles` - System roles (superadmin, admin, user)
- `books` - Book catalog with inventory tracking
- `borrow_histories` - Complete borrowing transaction records

**Relationships:**
- User → Role (Many-to-One)
- BorrowHistory → User (Many-to-One)
- BorrowHistory → Book (Many-to-One)

## Project Structure

```
library-system/
├── app/
│   ├── Http/
│   │   ├── Controllers/       # Application controllers
│   │   └── Middleware/        # Custom middleware (CheckRole, etc.)
│   ├── Models/                # Eloquent models
│   └── Policies/              # Authorization policies
├── database/
│   ├── migrations/            # Database migrations
│   └── seeders/               # Database seeders
├── resources/
│   └── views/                 # Blade templates
│       ├── Management/        # Admin management views
│       ├── auth/              # Authentication views
│       └── layouts/           # Layout templates
├── routes/
│   └── web.php                # Web routes
└── public/                    # Public assets
```

## Key Routes

**Public:**
- `/` - Home page
- `/login` - User login
- `/register` - User registration

**Admin/SuperAdmin:**
- `/manage/users` - User management
- `/manage/books` - Book management
- `/manage/bbh` - Borrow history management
- `/manage/borrowed` - View borrowed books
- `/manage/returned` - View returned books

**User:**
- `/books` - Browse available books
- `/user` - User dashboard

## Security Features

- Password hashing with bcrypt
- CSRF protection
- Role-based authorization with policies
- Authentication middleware
- Borrowing limit enforcement

## Contributing

Contributions are welcome! Feel free to:
1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the `LICENSE` file for details.
