<?php

namespace App\Enums;

enum PropertyStatus: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case DISAPPROVED = 'disapproved';
    case COMPLETED = 'completed';
}
