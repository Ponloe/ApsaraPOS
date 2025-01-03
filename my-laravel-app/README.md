# My Laravel App

## Overview
This is a Laravel application that provides user authentication features, including login and registration.

## Features
- User registration with name, email, password, and password confirmation.
- User login with email and password.
- "Remember Me" functionality for persistent login sessions.
- Password recovery link for users who forget their passwords.

## Setup Instructions
1. Clone the repository:
   ```
   git clone https://github.com/yourusername/my-laravel-app.git
   ```
2. Navigate to the project directory:
   ```
   cd my-laravel-app
   ```
3. Install dependencies:
   ```
   composer install
   ```
4. Set up your `.env` file:
   ```
   cp .env.example .env
   ```
   Then update the database and other configurations as needed.

5. Generate the application key:
   ```
   php artisan key:generate
   ```

6. Run the migrations:
   ```
   php artisan migrate
   ```

7. Start the development server:
   ```
   php artisan serve
   ```

Now you can access the application at `http://localhost:8000`.