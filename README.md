# 🎫 Ticket Management System

A modern Laravel-based ticket management system with role-based access control, payment processing, and employee management capabilities.

## 📋 Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Testing](#testing)
- [Deployment](#deployment)
- [Contributing](#contributing)
- [License](#license)

## ✨ Features

### 🎯 Core Functionality
- **Ticket Management**: Create, view, update, and delete tickets
- **Role-Based Access Control**: Admin, Individual, and Business user roles
- **Employee Management**: Admin-only employee management system
- **Payment Processing**: Integrated payment system for tickets
- **Status Tracking**: Track ticket status (Pending, In Progress, Completed)
- **User Authentication**: Secure login and registration system

### 🔐 User Roles
- **Admin**: Full system access, employee management, all ticket operations
- **Individual**: Create and manage personal tickets
- **Business**: Business-specific ticket management

### 🎨 User Interface
- **Modern Design**: Built with Tailwind CSS and Alpine.js
- **Responsive Layout**: Mobile-friendly interface
- **Real-time Updates**: Dynamic content updates
- **Payment Interface**: Streamlined payment processing

## 🛠 Tech Stack

### Backend
- **Laravel 12.x** - PHP web application framework
- **PHP 8.2+** - Server-side programming language
- **MySQL/SQLite** - Database management
- **Spatie Laravel Permission** - Role and permission management

### Frontend
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Vite** - Build tool and development server
- **Axios** - HTTP client for API requests

### Development Tools
- **Laravel Breeze** - Authentication scaffolding
- **Laravel Pint** - PHP code style fixer
- **Pest** - Testing framework
- **Laravel Sail** - Docker development environment

## 📋 Prerequisites

Before you begin, ensure you have the following installed:
- **PHP 8.2 or higher**
- **Composer** (PHP package manager)
- **Node.js 18+** and **npm**
- **MySQL** or **SQLite** database
- **Git** for version control

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/ticket-management-system.git
cd ticket-management-system
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install Node.js Dependencies
```bash
npm install
```

### 4. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure Database
Edit your `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ticket_system
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Run Database Migrations
```bash
php artisan migrate
```

### 7. Seed the Database (Optional)
```bash
php artisan db:seed
```

### 8. Build Frontend Assets
```bash
npm run build
```

## ⚙️ Configuration

### Environment Variables
Key environment variables to configure:

```env
APP_NAME="Ticket Management System"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ticket_system
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Permissions Setup
The system uses Spatie Laravel Permission. Ensure roles are properly configured:

```bash
php artisan permission:cache-reset
```

## 🎯 Usage

### Starting the Development Server
```bash
# Start Laravel development server
php artisan serve

# In another terminal, start Vite for frontend assets
npm run dev

# Or use the combined development command
composer run dev
```

### Accessing the Application
- **Homepage**: `http://localhost:8000`
- **Dashboard**: `http://localhost:8000/dashboard` (requires authentication)
- **Login**: `http://localhost:8000/login`
- **Register**: `http://localhost:8000/register`

### Creating Your First Admin User
1. Register a new account
2. Manually update the user's role in the database:
```sql
INSERT INTO model_has_roles (role_id, model_type, model_id) 
VALUES (1, 'App\\Models\\User', 1);
```

## 🔌 API Endpoints

### Authentication Routes
- `POST /login` - User login
- `POST /register` - User registration
- `POST /logout` - User logout

### Ticket Routes (Authenticated)
- `GET /tickets` - List all tickets
- `POST /tickets` - Create new ticket
- `GET /tickets/{id}` - View specific ticket
- `PUT /tickets/{id}` - Update ticket
- `DELETE /tickets/{id}` - Delete ticket
- `GET /payment/{id}` - Payment page
- `GET /payprocess/{id}` - Process payment

### Employee Routes (Admin Only)
- `GET /employees` - List all employees
- `POST /employees` - Create new employee
- `GET /employees/{id}` - View specific employee
- `PUT /employees/{id}` - Update employee
- `DELETE /employees/{id}` - Delete employee

### Profile Routes (Authenticated)
- `GET /profile` - View profile
- `PATCH /profile` - Update profile
- `DELETE /profile` - Delete account

## 🧪 Testing

### Running Tests
```bash
# Run all tests
php artisan test

# Run tests with coverage
php artisan test --coverage

# Run specific test file
php artisan test tests/Feature/TicketTest.php
```

### Test Structure
- **Feature Tests**: End-to-end functionality testing
- **Unit Tests**: Individual component testing
- **Database Tests**: Database operations testing

## 🚀 Deployment

### Production Build
```bash
# Install production dependencies
composer install --optimize-autoloader --no-dev

# Build frontend assets
npm run build

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force
```

### Server Requirements
- **PHP 8.2+** with required extensions
- **Web Server** (Apache/Nginx)
- **MySQL 8.0+** or **PostgreSQL 13+**
- **SSL Certificate** (recommended)

### Environment Variables for Production
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
LOG_LEVEL=error
```

## 🤝 Contributing

1. **Fork the repository**
2. **Create a feature branch**: `git checkout -b feature/amazing-feature`
3. **Commit your changes**: `git commit -m 'Add amazing feature'`
4. **Push to the branch**: `git push origin feature/amazing-feature`
5. **Open a Pull Request**

### Development Guidelines
- Follow PSR-12 coding standards
- Write tests for new features
- Update documentation as needed
- Use conventional commit messages

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Support

If you encounter any issues or have questions:

1. **Check the documentation** in this README
2. **Search existing issues** on GitHub
3. **Create a new issue** with detailed information
4. **Contact the development team**

## 🙏 Acknowledgments

- **Laravel Team** for the amazing framework
- **Spatie** for the permission package
- **Tailwind CSS** for the styling framework
- **Alpine.js** for the JavaScript framework

---

**Built with ❤️ using Laravel**
