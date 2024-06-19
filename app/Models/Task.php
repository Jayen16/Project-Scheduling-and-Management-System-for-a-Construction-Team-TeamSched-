<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $guarded = [];

    public function week(){
        return $this->belongsTo(Week::class, 'week_id', 'id');
    }
    public function progressReport(){
        return $this->hasMany(ProgressReport::class, 'task_id', 'id');
    }
    
}
