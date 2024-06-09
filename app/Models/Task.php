<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $guarded = [];

    public function manpower(){
        return $this->hasMany(AssignedMember::class, 'task_id', 'id');
    }

}
