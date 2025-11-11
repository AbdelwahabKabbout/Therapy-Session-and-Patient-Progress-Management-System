<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionNote extends Model
{
    use HasFactory;

    protected $table = 'session_notes';
    protected $primaryKey = 'NoteID';

    protected $fillable = [
        'PlanID',
        'SessionDate',
        'Summary',
        'TherapistComments',
        'NextSteps',
    ];

    protected $casts = [
        'SessionDate' => 'date',
    ];

    public function sessionPlan()
    {
        return $this->belongsTo(SessionPlan::class, 'PlanID', 'PlanID');
    }
}
