<?php

namespace App\Enums;

enum Status: string
{

    case COMPLETED = 'completed';
    case ONGOING = 'ongoing';
 

    public function label()
    {
        return match($this) {
            self::COMPLETED => 'Completed',
            self::ONGOING => 'Ongoing',
    
          
        };
    }

}

