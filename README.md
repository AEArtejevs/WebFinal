# WebFinal - Laravel + Breeze + Tailwind + Flowbite

This is a Laravel project built with Breeze, Tailwind CSS, Flowbite, and Vite.

## 🚀 Getting Started

Follow these steps to set up the project locally:

---

### 📦 Requirements

- PHP 8.1+
- Composer
- Node.js (v16+)
- NPM
- SQLite or MySQL

---

### 🔧 Installation

```bash
# Clone the repository
git clone https://github.com/your-username/WebFinal.git
cd WebFinal

# Copy environment file and generate key
cp .env.example .env
php artisan key:generate

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Compile assets (for dev)
npm run dev
# OR for production
# npm run build

# Set up database (SQLite or MySQL)
# If using SQLite:
touch database/database.sqlite

# Then run migrations and seeders
php artisan migrate --seed

# Start the development server
php artisan serve
