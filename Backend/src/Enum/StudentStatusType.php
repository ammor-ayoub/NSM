<?php

namespace App\Enum;

enum StudentStatusType: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case GRADUATED = 'graduated';
}