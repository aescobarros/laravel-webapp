<?php

namespace App\Models;

use App\Models\User;
use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;

class AccountBook extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'opened_at',
        'initial_position'
    ];

    public function user() {
        return $this->hasOne(User::class)->first();
    }

    public function expenses() {
        return $this->hasMany(Expense::class);
    }
}
