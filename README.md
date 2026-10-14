# Student Record Management System

A web-based **Student Record Management System** built with Laravel, PHP, and MySQL/MariaDB as part of a Web Development Internship. The application provides a centralized platform for managing student records, organizing course information, and accessing academic data through a responsive interface.

## Overview

The system simplifies student record administration by providing tools to create, view, update, search, filter, and delete student records. It also includes course management, dashboard statistics, user authentication, form validation, and dark mode.

## Key Features

### 1. Authentication and User Management
- User registration and login
- Secure logout functionality
- Authentication-protected routes
- User profile management

### 2. Student Management
- Create, view, update, and delete student records
- Automatically generate unique student IDs
- Search student information
- Filter records by course, gender, and semester
- Paginate student listings
- View detailed student information
- Validate form submissions

**Student ID format**

```text
STU001
STU002
STU003
```

### 3. Course Management
- View and search available courses
- Display the number of students associated with each course
- View students enrolled in a specific course

### 4. Dashboard and Statistics
- Total number of students
- Student counts by gender
- Total number of courses
- Quick navigation to frequently used features

### 5. Responsive Interface
- Layouts for desktop, laptop, tablet, and mobile devices
- Consistent navigation and page structure
- User-friendly forms and data tables
- Clear validation and error messages

### 6. Dark Mode
- Alternative dark interface
- Improved readability in different lighting conditions

## Technology Stack

| Technology | Purpose |
|---|---|
| Laravel | Backend framework |
| PHP | Server-side programming |
| MySQL / MariaDB | Relational database |
| Blade | Server-side templating |
| HTML5 | Page structure |
| CSS3 | Styling and layouts |
| JavaScript | Interactive functionality |
| Tailwind CSS | Utility-first styling |
| Alpine.js | Lightweight frontend interactions |
| Laravel Breeze | Authentication scaffolding |
| Vite | Frontend asset development and building |
| Git | Version control |
| GitHub | Source code hosting |
| XAMPP | Local development environment |
| Visual Studio Code | Code editor |

## Application Architecture

The application follows the **Model-View-Controller (MVC)** architectural pattern provided by Laravel.

```text
User
 |
 v
Routes
 |
 v
Controllers
 |
 +-------------------+
 |                   |
 v                   v
Models           Blade Views
 |                   |
 v                   v
Eloquent ORM     User Interface
 |
 v
MySQL / MariaDB
```

- **Routes:** Define application endpoints and direct requests to the appropriate handlers.
- **Controllers:** Process requests and coordinate application logic.
- **Models:** Represent database entities and manage data interactions.
- **Eloquent ORM:** Provides Laravel's object-oriented database interaction layer.
- **Blade Views:** Render pages and display application data.
- **Database:** Stores student, course, and related application information.

## Project Structure

```text
student-record-management/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
│   ├── web.php
│   └── auth.php
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

*This is a simplified overview. The actual directory structure may include additional files and directories.*

## Installation and Setup

Follow these steps to run the application locally.

### Prerequisites

Install the following tools:

- PHP
- Composer
- MySQL or MariaDB
- Node.js and npm
- Git
- XAMPP or another compatible local development environment

### 1. Clone the Repository

```bash
git clone https://github.com/Sujal1-hello/student-record-management.git
```

### 2. Navigate to the Project Directory

```bash
cd student-record-management
```

### 3. Install Dependencies

Install the PHP dependencies:

```bash
composer install
```

Install the frontend dependencies:

```bash
npm install
```

### 4. Configure the Environment

Create a local environment configuration file.

For Windows Command Prompt:

```bat
copy .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

### 5. Configure the Database

Start Apache and MySQL from the XAMPP Control Panel. Create a database named `student_record_db` in phpMyAdmin.

Update the relevant settings in your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_record_db
DB_USERNAME=root
DB_PASSWORD=
```

Adjust the database name and credentials to match your local environment.

### 6. Run Database Migrations

```bash
php artisan migrate
```

This creates the database tables defined by the application's migrations.

### 7. Build Frontend Assets

```bash
npm run build
```

### 8. Start the Development Server

```bash
php artisan serve
```

Open the application in your browser:

**http://127.0.0.1:8000**

Keep the development server running while using the application.

## Validation and Data Integrity

The application uses server-side form validation to help maintain consistent and valid records. Student information may include:

- Name and email address
- Phone number
- Date of birth
- Gender
- Course
- Semester

Validation rules determine which information is required and how submitted values are checked.

## Security

Security-related mechanisms include:

- User authentication through Laravel Breeze
- Protected routes using Laravel middleware
- Server-side request validation
- CSRF protection for applicable web forms
- Password hashing through Laravel's authentication mechanisms

Additional authorization policies and role-based access controls can be introduced as requirements expand.

## Potential Future Enhancements

- Student profile photo uploads
- Attendance management
- Grade and examination management
- Export records to CSV, Excel, or PDF
- Administrator and staff roles
- Email notifications
- Advanced reporting and analytics
- API integration
- Expanded automated test coverage

## Author

**Sujal Rai**

Web Developer Intern

Interested in building web applications using Laravel, PHP, React, Next.js, and modern web technologies.

## License

Developed for educational and internship purposes. No specific open-source license is declared.
