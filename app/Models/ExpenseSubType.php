<?php

namespace App\Models;

use App\Models\ExpenseType;
use Illuminate\Database\Eloquent\Model;

class ExpenseSubType extends Model
{
      protected $fillable = [
        'name',
        'expense',
        'user_id',
        'expense_type_id'
    ];

    public function expenseType() {
        $this->hasOne(ExpenseType::class)->first();
    }

    public function user() {
        return $this->hasOne(User::class)->first();
    }
}
