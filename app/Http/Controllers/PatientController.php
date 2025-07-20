<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::with(['appointments', 'medicalRecords'])
                           ->orderBy('registration_date', 'desc')
                           ->paginate(15);

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients',
            'phone' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string',
            'blood_group' => 'nullable|string',
            'emergency_contact' => 'nullable|string',
            'medical_history' => 'nullable|string',
            'insurance_number' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $patient = Patient::create(array_merge($request->all(), [
            'registration_date' => now()
        ]));

        return redirect()->route('patients.index')
                        ->with('success', 'Patient registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        $patient->load(['appointments.doctor', 'medicalRecords.doctor', 'prescriptions.doctor', 'bills']);
        
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'phone' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string',
            'blood_group' => 'nullable|string',
            'emergency_contact' => 'nullable|string',
            'medical_history' => 'nullable|string',
            'insurance_number' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $patient->update($request->all());

        return redirect()->route('patients.index')
                        ->with('success', 'Patient updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
                        ->with('success', 'Patient deleted successfully!');
    }

    /**
     * Display patient's medical history
     */
    public function medicalHistory(Patient $patient)
    {
        $medicalRecords = $patient->medicalRecords()
                                 ->with('doctor')
                                 ->orderBy('visit_date', 'desc')
                                 ->get();

        return view('patients.medical-history', compact('patient', 'medicalRecords'));
    }
}
