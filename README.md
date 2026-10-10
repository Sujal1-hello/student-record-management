# Student Record Management System

A web-based **Student Record Management System** developed using Laravel, PHP, and MySQL as part of a Web Development Internship.

The application provides a centralized platform for managing student records, courses, and academic information through a clean, responsive, and user-friendly interface.

## 🎯 Project Objective

The objective of this project is to develop a practical and reliable system that enables authorized users to manage student information efficiently, reduce manual recordkeeping, and organize academic data in one place.

## ✨ Features

### 🔐 1. Authentication and User Management

* User registration and login
* Secure logout functionality
* Protected application routes
* User profile management

### 👨‍🎓 2. Student Management

* Add new student records
* Automatically generate unique Student IDs
* View detailed student information
* Update existing student records
* Delete student records
* Search student information
* Filter students by course, gender, and semester
* Paginate student listings
* Validate student information through forms

#### Automatic Student ID Generation

Student IDs follow a consistent format:

```text
STU001
STU002
STU003
```

### 📚 3. Course Management

* View available courses
* Search for courses
* Display the number of students associated with each course
* View students belonging to a specific course

### 📊 4. Dashboard

The dashboard provides an overview of important academic information, including:

* Total number of students
* Male student count
* Female student count
* Other student count
* Total number of courses
* Quick actions for convenient navigation

### 📱 5. Responsive User Interface

* Responsive layouts for desktop, laptop, tablet, and mobile devices
* Consistent navigation and page layouts
* User-friendly forms and data tables
* Clear validation and error messages

### 🌙 6. Dark Mode

The application supports dark mode to improve readability and provide a comfortable viewing experience in different lighting conditions.

## 🛠️ Technologies Used

| Technology         | Purpose                                 |
| ------------------ | --------------------------------------- |
| Laravel            | Backend web application framework       |
| PHP                | Server-side programming                 |
| MySQL / MariaDB    | Relational database management          |
| Blade              | Server-rendered templates               |
| HTML5              | Page structure                          |
| CSS3               | Styling and layouts                     |
| JavaScript         | Interactive functionality               |
| Tailwind CSS       | Utility-based styling                   |
| Alpine.js          | Lightweight frontend interactions       |
| Laravel Breeze     | Authentication scaffolding              |
| Vite               | Frontend asset development and building |
| Git                | Version control                         |
| GitHub             | Source code hosting                     |
| XAMPP              | Local development environment           |
| Visual Studio Code | Code editor                             |

## 🏗️ System Architecture

The application follows a typical Laravel MVC (Model-View-Controller) architecture.

```text
User
  |
  v
Laravel Routes
  |
  v
Controllers
  |
  +-------------------+
  |                   |
  v                   v
Models             Blade Views
  |                   |
  v                   v
Eloquent ORM       User Interface
  |
  v
MySQL Database
```

* **Routes:** Define application endpoints and direct requests.
* **Controllers:** Handle application logic and coordinate requests.
* **Models:** Represent database entities and manage data interactions.
* **Eloquent ORM:** Provides an interface for working with database records.
* **Blade Views:** Render pages and display information to users.
* **MySQL:** Stores student, course, and related application data.

## 📂 Project Structure

The main project directories and files are organized as follows:

```text
student-record-management/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
│
├── bootstrap/
├── config/
├── database/
│   └── migrations/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   ├── web.php
│   └── auth.php
│
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

*Note: This is a simplified overview. The exact files and directories may vary depending on the current implementation.*

## ⚙️ Installation and Setup

Follow these steps to run the project locally.

### Prerequisites

Install the following software before proceeding:

* PHP and Composer
* MySQL or MariaDB
* Node.js and npm
* Git
* XAMPP or another compatible local development environment

### Step 1: Clone the Repository

```bash
git clone https://github.com/SujalRaiSujal1-hello/student-record-management.git
```

### Step 2: Navigate to the Project Directory

```bash
cd student-record-management
```

### Step 3: Install Dependencies

Install the PHP dependencies:

```bash
composer install
```

Install the frontend dependencies:

```bash
npm install
```

### Step 4: Configure the Environment

Create a local environment configuration file:

```bash
copy .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

### Step 5: Configure the Database

Start MySQL through XAMPP and create a database for the application.

Update the database settings in your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_record_management
DB_USERNAME=root
DB_PASSWORD=
```

Adjust the database name and credentials to match your local configuration.

### Step 6: Run Database Migrations

Create the database tables:

```bash
php artisan migrate
```

### Step 7: Build Frontend Assets

Compile the frontend assets:

```bash
npm run build
```

### Step 8: Start the Application

Run the Laravel development server:

```bash
php artisan serve
```

Open the application in your browser:

**http://127.0.0.1:8000**

## 🧪 Validation and Data Integrity

The application uses form validation to help ensure that submitted information meets the required rules.

Student information may include:

* Name
* Email address
* Phone number
* Date of birth
* Gender
* Course
* Semester

Validation errors are displayed in the relevant forms so users can correct invalid or missing information.

## 🔒 Security

The application uses Laravel Breeze for authentication and Laravel's route middleware to restrict access to protected pages.

Security-related features include:

* Authentication for registered users
* Protected routes for authorized access
* Server-side form validation
* CSRF protection for applicable forms
* Laravel's password hashing and authentication mechanisms

Additional authorization policies or role-based access controls can be introduced as the application evolves.

## 🚀 Future Improvements

Potential enhancements for future versions include:

* Student profile photo uploads
* Attendance management
* Grade and examination management
* Exporting student records to CSV, Excel, or PDF
* Administrator and staff roles
* Email notifications
* Advanced reporting and analytics
* API integration
* Automated testing and expanded test coverage

## 👨‍💻 Author

**Sujal Rai**

Web Developer Intern

Interested in developing modern web applications using Laravel, React, Next.js, and other web technologies.

## 📄 License

This project was developed for educational, internship, and portfolio purposes.
