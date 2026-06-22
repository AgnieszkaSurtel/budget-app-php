# Personal Finance Tracker (PHP MVC)

A modern, secure web application designed for personal budget management and financial tracking. Built from scratch using native PHP with strict adherence to the **Model-View-Controller (MVC)** architectural pattern.

## 🚀 Live Demo
You can check out the working application here: **[Wklej Tutaj Link Do One.com, jak już wrzucisz stronę]**

## ✨ Features
* **Full Authentication System:** Secure user registration and login.
* **Password Hashing:** Industry-standard secure password storage using `bcrypt` (via PHP's `password_hash`).
* **Financial Management:** Add, edit, and delete daily incomes and expenses.
* **Live Balance Dashboard:** Dynamically calculated financial summaries for the current month.
* **Relational Database:** Structured MySQL storage utilizing **PDO** to protect against SQL Injection.

## 🛠️ Tech Stack
* **Backend:** PHP 8.x (Pure PHP, No Frameworks)
* **Database:** MySQL / MariaDB (PDO)
* **Architecture:** MVC (Model-View-Controller)
* **Frontend:** HTML5, CSS3 (Custom Responsive Layout)

## 🔒 Security Practices
* **Database Credentials Protection:** Sensitive configuration and passwords are isolated in a local `config.php` file, which is strictly excluded from version control via `.gitignore`.
* **Deployment Readiness:** A `config.example.php` file is provided as a template for environment configuration.
* **Data Security:** All user passwords are encrypted using strong cryptographic hashing before database insertion.

## 📦 Local Setup
1. Clone the repository.
2. Duplicate `config.example.php` and rename it to `config.php`.
3. Provide your local XAMPP database credentials in `config.php`.
4. Import the database schema and run the project through your local server.