<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanExercise extends Model
{
    use HasFactory;

    protected $table = 'plan_exercises';
    public $incrementing = false;
    protected $primaryKey = ['PlanID', 'ExerciseID'];

    protected $fillable = [
        'PlanID',
        'ExerciseID',
        'AssignedDate',
        'CompletionStatus',
        'Note',
    ];

    protected $casts = [
        'AssignedDate' => 'date',
    ];

    public function sessionPlan()
    {
        return $this->belongsTo(SessionPlan::class, 'PlanID', 'PlanID');
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'ExerciseID', 'ExerciseID');
    }
}
