<?php

namespace App\Models;

use App\Models\User;
use App\Models\ExpenseSubType;
use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    protected $fillable = [
        'name',
        'expense',
        'user_id'
    ];

    public function expenseSubTypes() {
        return $this->hasMany(ExpenseSubType::class);
    }

    public function user() {
        return $this->belongsTo(User::class)->first();
    }
}
