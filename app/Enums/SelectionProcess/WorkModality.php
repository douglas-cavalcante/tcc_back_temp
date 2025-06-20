<?php

namespace App\Enums\SelectionProcess;

enum WorkModality: string
{
    case FULL_TIME =  "FULL_TIME";
    case HOURLY =  "HOURLY";
    case INTERMITTENT =  "INTERMITTENT";
    case REPRESENTATIVE =  "REPRESENTATIVE";
    case TEMPORARY =  "TEMPORARY";
}
