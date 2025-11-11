<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $primaryKey = 'AppointmentID';

    protected $fillable = [
        'PatientID',
        'TherapistID',
        'AppointmentDate',
        'DurationMinutes',
        'Status',
        'Notes',
    ];

    protected $casts = [
        'AppointmentDate' => 'datetime',
    ];

    // Belongs to a patient
    public function patient()
    {
        return $this->belongsTo(User::class, 'PatientID', 'PatientID');
    }

    // Belongs to a therapist
    public function therapist()
    {
        return $this->belongsTo(User::class, 'TherapistID', 'TherapistID');
    }

    // Has many payments
    public function payments()
    {
        return $this->hasMany(Payment::class, 'AppointmentID', 'AppointmentID');
    }
}
