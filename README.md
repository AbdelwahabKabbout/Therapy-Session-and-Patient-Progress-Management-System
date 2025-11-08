# Therapy-Session-and-Patient-Progress-Management-System
Mental health care relies heavily on personalized treatment, continuous observation, and clear communication between therapists and patients


# Therapy Session Management System

A Laravel 9 project for managing therapists, patients, session plans, exercises, and tracking patient progress.  
Built with **Blade components**, custom authentication, and role-based access (therapist/patient).

---


For a fresh start, run these commands **after cloning the repo**:

1. make a database inside Mysql xampp named "therapy_system"
```bash
git clone https://github.com/AbdelwahabKabbout/Therapy-Session-and-Patient-Progress-Management-System.git
cd Therapy-Session-and-Patient-Progress-Management-System
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
