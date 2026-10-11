# Student Record Management System

A web-based **Student Record Management System** developed using Laravel, PHP, and MySQL as part of a Web Development Internship.

The application provides a centralized platform for managing student records, organizing course information, and viewing academic data through a responsive and user-friendly interface.

## 🎯 Project Objectives

- Develop a practical web application using Laravel and PHP.
- Store and organize student information in a relational database.
- Implement CRUD operations for student records.
- Provide search, filtering, and pagination functionality.
- Apply authentication, form validation, and secure application practices.
- Build a responsive interface with a consistent user experience.

## ✨ Features

### 🔐 1. Authentication and User Management

- User registration and login
- Secure logout functionality
- Protected application routes
- User profile management

### 👨‍🎓 2. Student Management

- Add new student records
- Automatically generate unique student IDs
- View detailed student information
- Update existing student records
- Delete student records
- Search student information
- Filter students by course, gender, and semester
- Paginate student listings
- Validate student information through forms

**Automatic Student ID Generation**

Student IDs follow a consistent format:

```text
STU001
STU002
STU003
```

### 📚 3. Course Management

- View available courses
- Search for courses
- Display the number of students associated with each course
- View students enrolled in a specific course

### 📊 4. Dashboard

The dashboard provides an overview of student and course information, including:

- Total number of students
- Male student count
- Female student count
- Other gender count
- Total number of courses
- Quick navigation and convenient actions

### 📱 5. Responsive User Interface

- Responsive layouts for desktop, laptop, tablet, and mobile devices
- Consistent navigation and page layouts
- User-friendly forms and data tables
- Clear validation and error messages

### 🌙 6. Dark Mode

- Dark mode interface for comfortable viewing
- Improved readability in different lighting conditions

## 🛠️ Technologies Used

| Technology | Purpose |
|---|---|
| Laravel | Backend web application framework |
| PHP | Server-side programming |
| MySQL / MariaDB | Relational database |
| Blade | Server-rendered templates |
| HTML5 | Page structure |
| CSS3 | Styling and layouts |
| JavaScript | Interactive functionality |
| Tailwind CSS | Utility-based styling |
| Alpine.js | Lightweight frontend interactions |
| Laravel Breeze | Authentication scaffolding |
| Vite | Frontend asset development and building |
| Git | Version control |
| GitHub | Source code hosting |
| XAMPP | Local development environment |
| Visual Studio Code | Code editor |

## 🏗️ System Architecture

The application follows the **Model-View-Controller (MVC)** architecture provided by Laravel.

```text
User
  |
  v
Laravel Routes
  |
  v
Controllers
  |
  +------------------+
  |                  |
  v                  v
Models            Blade Views
  |                  |
  v                  v
Eloquent ORM     User Interface
  |
  v
MySQL Database
```

- **Routes:** Define application endpoints and direct incoming requests.
- **Controllers:** Handle application logic and coordinate requests.
- **Models:** Represent database entities and interact with stored data.
- **Eloquent ORM:** Simplifies database operations through Laravel models.
- **Blade Views:** Render application pages and display information.
- **MySQL:** Stores student, course, and related application data.

## 📂 Project Structure

```text
student-record-management/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   └── migrations/
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

*Note: This is a simplified overview. The actual directory structure may vary depending on the implementation.*

## ⚙️ Installation and Setup

Follow these steps to run the project locally.

### Prerequisites

Install the following software:

- PHP
- Composer
- MySQL or MariaDB
- Node.js and npm
- Git
- XAMPP or another compatible local development environment

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

Create your local environment file.

For Windows Command Prompt:

```bat
copy .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### Step 5: Configure the Database

Start MySQL through XAMPP and create a database named `student_record_management`.

Update the database configuration in your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_record_management
DB_USERNAME=root
DB_PASSWORD=
```

Adjust the credentials according to your local database configuration.

### Step 6: Run Database Migrations

```bash
php artisan migrate
```

This creates the database tables defined by the project's migrations.

### Step 7: Build Frontend Assets

```bash
npm run build
```

### Step 8: Start the Application

```bash
php artisan serve
```

Open the following address in your browser:

**http://127.0.0.1:8000**

## 🧪 Validation and Data Integrity

The application uses form validation to help ensure that submitted information meets the required rules.

Student information may include:

- Name
- Email address
- Phone number
- Date of birth
- Gender
- Course
- Semester

Validation messages help users identify and correct invalid or missing information before submitting forms.

## 🔒 Security

Security-related features include:

- User authentication through Laravel Breeze
- Protected routes using Laravel middleware
- Server-side form validation
- CSRF protection for applicable forms
- Password hashing through Laravel's authentication mechanisms

Additional authorization policies and role-based access controls can be implemented as the application evolves.

## 🚀 Future Improvements

Potential enhancements include:

- Student profile photo uploads
- Attendance management
- Grade and examination management
- Exporting records to CSV, Excel, or PDF
- Administrator and staff roles
- Email notifications
- Advanced reporting and analytics
- API integration
- Automated testing and expanded test coverage

## 👨‍💻 Author

**Sujal Rai**

Web Developer Intern

Interested in developing modern web applications using Laravel, PHP, React, Next.js, and other web technologies.

## 📄 License

This project was developed for educational, internship, and portfolio purposes.

