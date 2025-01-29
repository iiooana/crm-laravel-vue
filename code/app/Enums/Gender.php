<?php

namespace App\Enums;

enum Gender: string
{
    case Male = 'Male';
    case Female = 'Female';
    case NotBinary = 'Not-binary';
    case NotAnswer = 'Prefer not to Answer';
    case Other = 'Other';
}
