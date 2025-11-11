<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionPlan extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'session_plans';
    protected $primaryKey = 'PlanID';

    protected $fillable = [
        'PatientID',
        'Title',
        'Description',
        'StartDate',
        'EndDate',
        'Status',
    ];

    protected $casts = [
        'StartDate' => 'date',
        'EndDate' => 'date',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'PatientID', 'PatientID');
    }

    public function sessionNotes()
    {
        return $this->hasMany(SessionNote::class, 'PlanID', 'PlanID');
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'plan_exercises', 'PlanID', 'ExerciseID')
            ->withPivot('AssignedDate', 'CompletionStatus', 'Note')
            ->withTimestamps();
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class, 'plan_resources', 'PlanID', 'ResourceID')
            ->withPivot('AssignedDate')
            ->withTimestamps();
    }
}
