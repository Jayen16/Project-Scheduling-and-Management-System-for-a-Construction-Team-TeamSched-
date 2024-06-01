<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $guarded = [];

    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
