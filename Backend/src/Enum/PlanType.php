<?php

namespace App\Enum;

enum PlanType: string
{
    case FREE = 'free';
    case STANDARD = 'standard';
    case PREMIUM = 'premium';
    case GOLD = 'gold';
}