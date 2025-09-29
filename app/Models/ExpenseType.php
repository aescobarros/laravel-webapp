<?php

namespace App\Models;

use App\Models\User;
use App\Models\ExpenseSubType;
use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function user() {
        return $this->belongsTo(User::class)->first();
    }
}
