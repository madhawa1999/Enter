<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Hospital Management System Routes
Route::middleware(['auth'])->group(function () {
    
    // Patients
    Route::resource('patients', PatientController::class);
    Route::get('patients/{patient}/medical-history', [PatientController::class, 'medicalHistory'])->name('patients.medical-history');
    
    // Doctors
    Route::resource('doctors', DoctorController::class);
    Route::get('doctors/{doctor}/schedule', [DoctorController::class, 'schedule'])->name('doctors.schedule');
    
    // Departments
    Route::resource('departments', DepartmentController::class);
    
    // Appointments
    Route::resource('appointments', AppointmentController::class);
    Route::patch('appointments/{appointment}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.update-status');
    Route::get('appointments/calendar/view', [AppointmentController::class, 'calendar'])->name('appointments.calendar');
    
    // Medical Records
    Route::resource('medical-records', MedicalRecordController::class);
    Route::get('patients/{patient}/medical-records', [MedicalRecordController::class, 'patientRecords'])->name('patients.medical-records');
    
    // Medicines
    Route::resource('medicines', MedicineController::class);
    Route::get('medicines/low-stock/alert', [MedicineController::class, 'lowStock'])->name('medicines.low-stock');
    Route::get('medicines/expired/list', [MedicineController::class, 'expired'])->name('medicines.expired');
    
    // Prescriptions
    Route::resource('prescriptions', PrescriptionController::class);
    Route::get('patients/{patient}/prescriptions', [PrescriptionController::class, 'patientPrescriptions'])->name('patients.prescriptions');
    Route::post('prescriptions/{prescription}/medicines', [PrescriptionController::class, 'addMedicine'])->name('prescriptions.add-medicine');
    Route::delete('prescriptions/{prescription}/medicines/{medicine}', [PrescriptionController::class, 'removeMedicine'])->name('prescriptions.remove-medicine');
    
    // Bills
    Route::resource('bills', BillController::class);
    Route::get('patients/{patient}/bills', [BillController::class, 'patientBills'])->name('patients.bills');
    Route::patch('bills/{bill}/payment', [BillController::class, 'updatePayment'])->name('bills.update-payment');
    
    // Rooms
    Route::resource('rooms', RoomController::class);
    Route::get('rooms/available/list', [RoomController::class, 'available'])->name('rooms.available');
    
    // Staff
    Route::resource('staff', StaffController::class);
    Route::get('staff/department/{department}', [StaffController::class, 'byDepartment'])->name('staff.by-department');
    
    // Reports and Analytics
    Route::get('reports/dashboard', function () {
        return view('reports.dashboard');
    })->name('reports.dashboard');
    
    Route::get('reports/patients', function () {
        return view('reports.patients');
    })->name('reports.patients');
    
    Route::get('reports/appointments', function () {
        return view('reports.appointments');
    })->name('reports.appointments');
    
    Route::get('reports/revenue', function () {
        return view('reports.revenue');
    })->name('reports.revenue');
});

require __DIR__.'/auth.php';
