<?php

namespace App\Models;

use App\Models\ExpenseType;
use App\Models\ExpenseSubType;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{

    protected $fillable = [
        'date',
        'description',
        'account_book_id',
        'expense_type_id',
        'user_id',
        'amount',
        'state'
    ];

    public function expenseType() {
        return $this->belongsTo(ExpenseType::class)->first();
    }
      
}
