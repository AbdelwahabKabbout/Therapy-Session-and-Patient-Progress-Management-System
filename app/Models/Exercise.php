<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $table = 'exercises';
    protected $primaryKey = 'ExerciseID';

    protected $fillable = [
        'Title',
        'Description',
        'DifficultyLevel',
        'DurationMinutes',
    ];

    public function sessionPlans()
    {
        return $this->belongsToMany(SessionPlan::class, 'plan_exercises', 'ExerciseID', 'PlanID')
            ->withPivot('AssignedDate', 'CompletionStatus', 'Note')
            ->withTimestamps();
    }
}
