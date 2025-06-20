<?php

namespace App\Enums\SelectionProcess;

enum StatusStepsSelectionProcess: string
{
    case ANALYZING =  "ANALYZING";
    case DISAPPROVED =  "DISAPPROVED";
    case FINISHED =  "DONE";
}
