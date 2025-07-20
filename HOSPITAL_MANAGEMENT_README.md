# Hospital Management System - Laravel

A comprehensive hospital management system built with Laravel 12, featuring patient management, doctor scheduling, appointment booking, medical records, prescriptions, billing, and more.

## Features

### 🏥 Core Modules

#### 1. Patient Management
- Patient registration with complete demographic information
- Medical history tracking
- Blood group and emergency contact management
- Insurance information
- Patient search and filtering

#### 2. Doctor Management
- Doctor profiles with specializations
- Department assignments
- Schedule management
- Availability tracking
- Experience and qualification records

#### 3. Department Management
- Hospital department organization
- Department head assignments
- Location and contact information
- Staff allocation by department

#### 4. Appointment System
- Online appointment booking
- Doctor availability checking
- Appointment status management (scheduled, confirmed, completed, cancelled)
- Calendar view for appointments
- Room assignment for appointments

#### 5. Medical Records
- Comprehensive patient medical history
- Visit tracking with symptoms and diagnosis
- Treatment records
- Vital signs monitoring
- Lab results storage
- Allergy and medication tracking

#### 6. Medicine Inventory
- Medicine catalog with detailed information
- Stock level monitoring
- Low stock alerts
- Expiry date tracking
- Batch number management
- Category and dosage form classification

#### 7. Prescription Management
- Digital prescription creation
- Medicine dispensing tracking
- Dosage and instruction management
- Patient prescription history
- Integration with medicine inventory

#### 8. Billing System
- Patient billing with itemized services
- Payment tracking (cash, card, insurance)
- Outstanding balance management
- Payment history
- Service and medicine charges

#### 9. Room Management
- Room availability tracking
- Room type classification (general, private, ICU, operation, emergency)
- Equipment inventory per room
- Daily rate management
- Occupancy status

#### 10. Staff Management
- Hospital staff records
- Position and department assignments
- Shift management
- Salary information
- Qualification tracking

### 📊 Dashboard & Reports
- Real-time statistics dashboard
- Patient registration trends
- Appointment analytics
- Revenue reports
- Inventory status
- Staff performance metrics

## Database Schema

### Core Tables
- `patients` - Patient demographic and medical information
- `doctors` - Doctor profiles and availability
- `departments` - Hospital departments
- `appointments` - Appointment scheduling
- `medical_records` - Patient medical history
- `medicines` - Medicine inventory
- `prescriptions` - Prescription management
- `prescription_medicines` - Many-to-many relationship for prescription items
- `bills` - Patient billing
- `rooms` - Room management
- `staff` - Hospital staff records

## Installation & Setup

### Prerequisites
- PHP 8.4+
- Composer
- MySQL or PostgreSQL
- Node.js & NPM

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd hospital-management-system
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database configuration**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=hospital_management
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

8. **Start the server**
   ```bash
   php artisan serve
   ```

## Usage

### Getting Started

1. **User Registration**: Create an account using Laravel Breeze authentication
2. **Dashboard**: Access the main dashboard to view system overview
3. **Patient Registration**: Start by registering patients in the system
4. **Doctor Setup**: Add doctors and their specializations
5. **Department Configuration**: Set up hospital departments
6. **Appointment Booking**: Schedule appointments between patients and doctors

### Key Workflows

#### Patient Registration Flow
1. Navigate to Patients → Add New Patient
2. Fill in personal information (name, DOB, gender, blood group)
3. Add contact details (email, phone, address, emergency contact)
4. Include medical history and insurance information
5. Submit to register the patient

#### Appointment Booking Flow
1. Go to Appointments → Book Appointment
2. Select patient and doctor
3. Choose available date and time
4. Assign purpose and room if needed
5. Confirm the appointment

#### Prescription Management Flow
1. Create new prescription for a patient
2. Select prescribing doctor
3. Add medicines with quantities and dosages
4. Include special instructions
5. Track dispensing status

## API Endpoints

The system provides RESTful API endpoints for all major resources:

- `/api/patients` - Patient management
- `/api/doctors` - Doctor management
- `/api/appointments` - Appointment system
- `/api/medical-records` - Medical records
- `/api/prescriptions` - Prescription management
- `/api/medicines` - Medicine inventory
- `/api/bills` - Billing system

## Security Features

- **Authentication**: Laravel Breeze with secure user management
- **Authorization**: Role-based access control
- **Data Validation**: Comprehensive input validation
- **CSRF Protection**: Built-in CSRF token validation
- **SQL Injection Prevention**: Eloquent ORM with prepared statements

## Technology Stack

- **Backend**: Laravel 12 (PHP 8.4)
- **Frontend**: Blade templates with Tailwind CSS
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Breeze
- **Build Tools**: Vite
- **Icons**: Heroicons

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Future Enhancements

- [ ] Mobile app integration
- [ ] Telemedicine features
- [ ] Laboratory management
- [ ] Pharmacy integration
- [ ] Insurance claim processing
- [ ] Advanced reporting and analytics
- [ ] Multi-language support
- [ ] SMS/Email notifications
- [ ] Integration with medical devices
- [ ] AI-powered diagnosis assistance

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For support and questions, please contact the development team or create an issue in the repository.

---

**Note**: This is a comprehensive hospital management system designed for educational and development purposes. For production use in actual healthcare settings, ensure compliance with relevant healthcare regulations and data protection laws (HIPAA, GDPR, etc.).