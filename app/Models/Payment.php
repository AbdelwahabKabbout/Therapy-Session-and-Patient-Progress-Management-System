<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'PaymentID';

    protected $fillable = [
        'PatientID',
        'AppointmentID',
        'Amount',
        'PaymentDate',
        'PaymentMethod',
        'Status',
    ];

    protected $casts = [
        'PaymentDate' => 'date',
        'Amount' => 'decimal:2',
    ];

    // Belongs to a patient
    public function patient()
    {
        return $this->belongsTo(User::class, 'PatientID', 'PatientID');
    }

    // Belongs to an appointment
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'AppointmentID', 'AppointmentID');
    }
}
