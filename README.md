# Student Record Management System

A web-based Student Record Management System developed using Laravel and MySQL as part of my Web Development Internship.

The system allows authenticated users to manage student records, courses, and academic information through a clean and responsive web interface.

---

## 👨‍💻 Internship Project

| Information | Details |
|---|---|
| Project | Student Record Management System |
| Developer | Sujal Rai |
| Internship Role | Web Developer Intern |
| Framework | Laravel |
| Backend | PHP |
| Database | MySQL / MariaDB |
| Frontend | Blade, HTML, CSS, JavaScript |
| Authentication | Laravel Breeze |
| Version Control | Git & GitHub |
| Development Environment | XAMPP, VS Code |
| Status | ✅ Completed |

---

# 🎯 Project Objective

The main objective of this project is to develop a practical Student Record Management System that allows authorized users to manage student information efficiently.

The system provides features for:

- Student registration
- Student record management
- Automatic Student ID generation
- Student search
- Student filtering
- Student information updates
- Student deletion
- Student details
- Course management
- Authentication
- Form validation
- Dashboard statistics
- Responsive design
- Dark mode

---

# ✨ Features

## 🔐 Authentication

- User registration
- User login
- User logout
- Protected application routes
- Profile management

## 👨‍🎓 Student Management

- Add new students
- Automatically generate Student IDs
- View student details
- Edit student information
- Delete student records
- Search students
- Filter by course
- Filter by gender
- Filter by semester
- Pagination
- Form validation

### Automatic Student ID

Student IDs are generated automatically in the following format:

```text
STU001
STU002
STU003

📚 Course Management
View courses
Search courses
Display the number of students per course
View students belonging to a specific course
📊 Dashboard

The dashboard provides an overview of the system, including:

Total students
Male students
Female students
Other students
Total courses
Quick actions
📱 Responsive Design

The application is designed to work across:

Desktop
Laptop
Tablet
Mobile
🌙 Dark Mode

The application supports dark mode for a better user experience.

🏗️ System Architecture
User
 │
 ▼
Laravel Routes
 │
 ▼
Controller
 │
 ▼
Model / Eloquent ORM
 │
 ▼
MySQL Database
 │
 ▼
Blade Views
 │
 ▼
User Interface
🛠️ Technologies Used
Laravel
PHP
MySQL / MariaDB
Blade
HTML
CSS
JavaScript
Tailwind CSS
Alpine.js
Laravel Breeze
Vite
Git
GitHub
XAMPP
VS Code
📂 Main Project Structure
student-record-management/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
│
├── database/
│   └── migrations/
│
├── resources/
│   ├── css/
│   └── views/
│
├── routes/
│   ├── web.php
│   └── auth.php
│
├── public/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
⚙️ Installation
1. Clone the repository
git clone https://github.com/SujalRaiSujal1-hello/student-record-management.git
2. Open the project
cd student-record-management
3. Install PHP dependencies
composer install
4. Install frontend dependencies
npm install
5. Create the environment file
copy .env.example .env
6. Generate the application key
php artisan key:generate
7. Configure the database

Create a MySQL database and update the .env file:

DB_DATABASE=student_record_management
DB_USERNAME=root
DB_PASSWORD=
8. Run migrations
php artisan migrate
9. Build frontend assets
npm run build
10. Start the Laravel server
php artisan serve

Open the application in your browser:

http://127.0.0.1:8000
🧪 Validation

The application validates important student information including:

Name
Email
Phone number
Date of birth
Gender
Course
Semester

Validation errors are displayed directly in the forms.

🔒 Security

The application uses authentication and protected routes to ensure that student management features are available only to authenticated users.

Laravel Breeze is used to provide the authentication system.

🚀 Future Improvements

Possible future improvements include:

Student profile photos
Attendance management
Grade management
Export student records
Admin and staff roles
Email notifications
Advanced reporting
API integration
👨‍💻 Author

Sujal Rai

Web Developer Intern

Interested in building modern web applications using Laravel, React, Next.js, and related technologies.

📄 License

This project was developed for educational, internship, and portfolio purposes.


After saving it, run:

```bash
git add README.md
git commit -m "Update project README"
git push