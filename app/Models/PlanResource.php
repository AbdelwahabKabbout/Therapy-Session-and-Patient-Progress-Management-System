<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanResource extends Model
{
    use HasFactory;

    protected $table = 'plan_resources';
    public $incrementing = false;
    protected $primaryKey = ['PlanID', 'ResourceID'];

    protected $fillable = [
        'PlanID',
        'ResourceID',
        'AssignedDate',
    ];

    protected $casts = [
        'AssignedDate' => 'date',
    ];

    public function sessionPlan()
    {
        return $this->belongsTo(SessionPlan::class, 'PlanID', 'PlanID');
    }

    public function resource()
    {
        return $this->belongsTo(Resource::class, 'ResourceID', 'ResourceID');
    }
}
