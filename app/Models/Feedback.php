<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';
    protected $primaryKey = 'FeedbackID';

    protected $fillable = [
        'PatientID',
        'TherapistID',
        'Date',
        'Rating',
        'Comment',
    ];

    protected $casts = [
        'Date' => 'date',
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
}
