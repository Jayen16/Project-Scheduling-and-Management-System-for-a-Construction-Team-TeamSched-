<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedProject extends Model
{
    use HasFactory;
    public $guarded = [];

    public function employee(){
        return $this->belongsTo(Employee::class, 'supervisor_id', 'id');
    }

}
