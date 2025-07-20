# Hospital Management System - How to Open

## Quick Start Guide

### 1. Create Database File
```bash
touch database/database.sqlite
```

### 2. Run Database Migrations
```bash
php artisan migrate
```

### 3. Build Frontend Assets
```bash
npm run build
```

### 4. Start the Laravel Server
```bash
php artisan serve
```

The application will be available at: **http://localhost:8000**

## Alternative Method (Development Mode)

For development with hot reloading:

### Terminal 1 - Laravel Server
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

### Terminal 2 - Vite Development Server
```bash
npm run dev
```

## Access the System

1. **Main Dashboard**: http://localhost:8000
2. **Login/Register**: http://localhost:8000/login
3. **Patient Management**: http://localhost:8000/patients
4. **Doctor Management**: http://localhost:8000/doctors
5. **Appointments**: http://localhost:8000/appointments

## Default Features Available

- ✅ Patient Registration and Management
- ✅ Doctor Management
- ✅ Department Management
- ✅ Appointment Scheduling
- ✅ Medical Records
- ✅ Prescription Management
- ✅ Billing System
- ✅ Room Management
- ✅ Staff Management
- ✅ User Authentication (Login/Register)
- ✅ Dashboard with Statistics

## Troubleshooting

### If migrations fail:
```bash
php artisan migrate:fresh
```

### If assets don't load:
```bash
npm install
npm run build
```

### If database issues:
```bash
rm database/database.sqlite
touch database/database.sqlite
php artisan migrate
```

## Creating Sample Data

To populate with test data:
```bash
php artisan db:seed
```

---

**Note**: Make sure you have PHP 8.4+ and Node.js installed on your system.