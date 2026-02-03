<?php

namespace App\Enums;

enum AgencyStatus: string
{
    case PENDING = 'pending';
    case ACTIVE = 'active';
    case DISABLED = 'disabled';
    case DISAPPROVED = 'disapproved';
}
