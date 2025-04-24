<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'name', 'code', 'type', 'is_group', 'parent_id'
    ];

    // Parent account (for group hierarchy)
    public function parent()
    {
        return $this->belongsTo(Account::class, 'parent_id');
    }

    // Child accounts (if this is a group)
    public function children()
    {
        return $this->hasMany(Account::class, 'parent_id');
    }
}
