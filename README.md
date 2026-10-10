

---

# 🎯 Project Objective

The objective of this project is to develop a practical Student Record Management System that helps authorized users manage student information efficiently.

## ✨ Features

### 🔐 Authentication

* User registration and login
* User logout
* Protected application routes
* Profile management

### 👨‍🎓 Student Management

* Add, view, edit, and delete student records
* Automatic Student ID generation
* Search students by relevant information
* Filter by course, gender, and semester
* Pagination and form validation
* View detailed student information

### 📚 Course Management

* View available courses
* Search courses
* Display student counts per course
* View students belonging to a course

### 📊 Dashboard

* Total student count
* Male, female, and other student counts
* Total courses
* Quick actions

### 📱 User Interface

* Responsive layout for desktop, tablet, and mobile
* Dark mode support

### 🆔 Automatic Student ID

Student IDs follow this format:

```text
STU001
STU002
STU003
```

### 🧪 Validation

The application validates student information such as name, email, phone number, date of birth, gender, course, and semester.

Validation errors are displayed directly in the forms.

### 🔒 Security

Laravel Breeze provides authentication, while protected routes restrict access to authorized users.


## 🛠️ Technologies Used

* Laravel and PHP
* MySQL / MariaDB
* Blade, HTML, CSS, and JavaScript
* Tailwind CSS and Alpine.js
* Laravel Breeze
* Vite
* Git and GitHub
* XAMPP and VS Code

## ⚙️ Installation

### 1. Clone the repository

```bash
git clone https://github.com/SujalRaiSujal1-hello/student-record-management.git
```

### 2. Open the project directory

```bash
cd student-record-management
```

### 3. Install dependencies

```bash
composer install
npm install
```

### 4. Configure the environment

```bash
copy .env.example .env
php artisan key:generate
```

Create a MySQL database and configure your `.env` file with the correct database name and credentials.

### 5. Run database migrations

```bash
php artisan migrate
```

### 6. Build frontend assets

```bash
npm run build
```

### 7. Start the Laravel server

```bash
php artisan serve
```

Open `http://127.0.0.1:8000` in your browser.

## 🚀 Future Improvements

Potential enhancements include:

* Student profile photos
* Attendance and grade management
* Exporting student records
* Admin and staff roles
* Email notifications
* Advanced reporting
* API integration

## 👨‍💻 Author

**Sujal Rai**

Web Developer Intern

Interested in building modern web applications using Laravel, React, Next.js, and related technologies.

## 📄 License

This project was developed for educational, internship, and portfolio purposes.
