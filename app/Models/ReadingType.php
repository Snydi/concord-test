<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasOne;

class ReadingType extends Model
{
    protected $fillable = ['value'];

    public function readings(): hasOne
    {
        return $this->hasOne(Reading::class);
    }
}
