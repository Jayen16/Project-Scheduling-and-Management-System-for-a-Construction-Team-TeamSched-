<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $guarded = [];

    public function scope(){
        return $this->hasMany(Week::class, 'project_id', 'id');
    }

    public function assignedProject(){
        return $this->hasOne(AssignedProject::class, 'project_id', 'id');
    }

}
