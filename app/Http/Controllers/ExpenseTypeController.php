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

        $expenses = ExpenseType::where('user_id', '=', $user->id)
            ->where('expense', '=', 1)->orderBy('name', 'ASC')->get();

        $incomes = ExpenseType::where('user_id', '=', $user->id)
            ->where('expense', '=', 0)->orderBy('name', 'ASC')->get();

        $expense_types = ExpenseType::where('user_id', '=', $user->id)
            ->orderBy('name', 'ASC')->get();


        return view('application.expense-types.index', [
            'expenses' => $expenses,
            'incomes' => $incomes,
            'expense_types' => $expense_types
        ]);
    }

       /**
     * Store a newly created resource in storage.
     */
    public function storeSubCategory(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'expense_type_id' => 'required|exists:expense_types,id'
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
           return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();
        DB::beginTransaction();
        try {
            DB::table('expense_sub_types')
                ->insert([
                        'name' => $validated['name'],
                        'expense' => ExpenseType::where('id', '=', $validated['expense_type_id'])->first()->expense,
                        'expense_type_id' => $validated['expense_type_id'],
                        'user_id' => $user->id
                    ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            Session::flash('failure', 'Something Went Wrong!!!');
            return redirect()->back();
        }

        Session::flash('succes', 'Expense Sub Type Added');

        return redirect()->route('application.expense-types.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'expense' => 'required|in:1,0'
        ]);

        if ($validator->fails()) {
           return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();

        DB::beginTransaction();
        try {
            DB::table('expense_types')
                ->insert([
                        'name' => $validated['name'],
                        'expense' => $validated['expense'],
                        'user_id' => $user->id
                    ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            dd($e->getMessage());
            Session::flash('failure', 'Something Went Wrong!!!');
            return redirect()->back();
        }

        Session::flash('succes', 'Expense Type Added');

        return redirect()->route('application.expense-types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();

        $expenses = ExpenseType::where('user_id', '=', $user->id)
            ->where('expense', '=', 1)->orderBy('name', 'DESC')->get();

        $incomes = ExpenseType::where('user_id', '=', $user->id)
            ->where('expense', '=', 0)->orderBy('name', 'DESC')->get();

        return view('application.expense-types.edit', [
            'expenses' => $expenses,
            'incomes' => $incomes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'expense_types.*' => 'required|string',
            'expense_sub_types.*' => 'required|string'
        ]);

        if ($validator->fails()) {
           return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();

        DB::beginTransaction();
        foreach ($validated['expense_types'] as $id => $name) {
            try {
                DB::table('expense_types')->where('id', '=', $id)
                    ->where('user_id', '=', $user->id)
                    ->update([
                            'name' => $name
                        ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                Log::error($e->getMessage());
                Session::flash('failure', 'Something Went Wrong!!!');
                return redirect()->back();
            }
        }

        DB::beginTransaction();
        foreach ($validated['expense_sub_types'] as $id => $name) {
            try {
                DB::table('expense_sub_types')->where('id', '=', $id)
                    ->where('user_id', '=', $user->id)
                    ->update([
                            'name' => $name
                        ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                Log::error($e->getMessage());
                Session::flash('failure', 'Something Went Wrong!!!');
                return redirect()->back();
            }
        }

        Session::flash('succes', 'Expense Type Updated');

        return redirect()->route('application.expense-types.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
