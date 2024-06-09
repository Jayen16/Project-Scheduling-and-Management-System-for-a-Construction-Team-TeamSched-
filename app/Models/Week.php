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

}
