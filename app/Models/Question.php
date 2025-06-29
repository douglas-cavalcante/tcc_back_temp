<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'topic',
        'item_a',
        'item_b',
        'item_c',
        'item_d',
        'item_e',
        'explanation_correct',
        'explanation_incorrect',
        'correct_item',
        'subject_id',
        'amount'
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
