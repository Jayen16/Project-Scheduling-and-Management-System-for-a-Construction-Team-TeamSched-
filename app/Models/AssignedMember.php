<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedMember extends Model
{
    use HasFactory;
    public $guarded = [];

    public function employee(){
        return $this->belongsTo(Employee::class, 'manpower_id', 'id');
    }

    
    public function week(){
        return $this->belongsTo(Week::class, 'week_id', 'id');
    }
    
}
