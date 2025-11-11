<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $table = 'resources';
    protected $primaryKey = 'ResourceID';

    protected $fillable = [
        'Title',
        'Description',
        'ResourceType',
        'URL',
    ];

    // Many-to-many with session plans through PlanResource
    public function sessionPlans()
    {
        return $this->belongsToMany(SessionPlan::class, 'plan_resources', 'ResourceID', 'PlanID')
            ->withPivot('AssignedDate')
            ->withTimestamps();
    }
}
