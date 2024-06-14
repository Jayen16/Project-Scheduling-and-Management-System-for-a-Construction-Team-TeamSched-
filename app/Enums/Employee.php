<?php

namespace App\Enums;

enum Employee: string
{

    case MANPOWER = 'manpower';
    case SUPERVISOR = 'supervisor';
    case MANAGER = 'manager';
    case ADMIN = 'admin';
   

    public function label()
    {
        return match($this) {
            self::MANPOWER => 'Manpower',
            self::SUPERVISOR => 'Site Supervisor',
            self::MANAGER => 'Project Manager',
            self::ADMIN => 'Admin',
          
        };
    }

}

