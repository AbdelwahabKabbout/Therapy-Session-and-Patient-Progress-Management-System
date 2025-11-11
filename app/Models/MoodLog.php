<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoodLog extends Model
{
    use HasFactory;

    protected $table = 'mood_logs';
    protected $primaryKey = 'LogID';

    protected $fillable = [
        'PatientID',
        'LogDate',
        'MoodRating',
        'Reflection',
    ];

    protected $casts = [
        'LogDate' => 'date',
    ];

    // Belongs to a patient
    public function patient()
    {
        return $this->belongsTo(User::class, 'PatientID', 'PatientID');
    }
}
