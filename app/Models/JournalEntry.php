<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    protected $fillable = ['entry_date', 'description'];

    public function lines()
    {
        return $this->hasMany(JournalEntryLine::class);
    }
}

