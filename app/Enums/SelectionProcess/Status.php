<?php

namespace App\Enums\SelectionProcess;

enum Status: string
{
    case CREATED =  "CREATED";
    case OPEN =  "OPEN";
    case PAUSED =  "PAUSED";
    case FINISHED =  "FINISHED";
}
