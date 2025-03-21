<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Reading extends Model
{
    protected $fillable = ['value', 'borderColor', 'type_id'];

    public function readingType(): belongsTo
    {
        return $this->belongsTo(ReadingType::class);
    }
}
