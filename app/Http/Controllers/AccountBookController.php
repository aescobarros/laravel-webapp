<?php

namespace App\Http\Controllers;

use App\Models\AccountBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $account_books = AccountBook::where('user_id', '=', $user->id)
            ->orderBy('name', 'ASC')->get();


        return view('application.account-books.index', [
            'account_books' => $account_books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        
        $account_book = AccountBook::where('user_id', '=', $user->id)->where('id', '=', $id)->first();

        return view('application.account-books.show', [
            'account_book' => $account_book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
