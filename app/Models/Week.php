<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;
    public $guarded = [];

    public function task(){
        return $this->hasMany(Task::class, 'week_id', 'id');
    }

    public function assignedmember(){
        return $this->hasMany(AssignedMember::class, 'week_id', 'id');
    }

    public function project(){
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }


}
