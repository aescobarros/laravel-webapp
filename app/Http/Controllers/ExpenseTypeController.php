<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        $expenses = ExpenseType::where('expense', '=', 1)->orderBy('name', 'ASC')->get();

        $incomes = ExpenseType::where('expense', '=', 0)->orderBy('name', 'ASC')->get();


        return view('application.expense-types.index', [
            'expenses' => $expenses,
            'incomes' => $incomes,
        ]);
    }

}
