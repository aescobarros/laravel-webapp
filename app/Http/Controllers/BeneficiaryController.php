<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $beneficiaries = Beneficiary::where('user_id', '=', $user->id)
            ->orderBy('name', 'ASC')->get();


        return view('application.beneficiaries.index', [
            'beneficiaries' => $beneficiaries,
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
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
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
            DB::table('beneficiaries')
                ->insert([
                        'name' => $validated['name'],
                        'user_id' => $user->id
                    ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            Session::flash('failure', 'Something Went Wrong!!!');
            return redirect()->back();
        }

        Session::flash('succes', 'Beneficiary Type Added');

        return redirect()->route('application.beneficiaries.index');
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

        $beneficiaries = Beneficiary::where('user_id', '=', $user->id)
            ->orderBy('name', 'ASC')->get();
        
        return view('application.beneficiaries.edit', [
            'beneficiaries' => $beneficiaries
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'beneficiaries.*' => 'required|string',
        ]);

        if ($validator->fails()) {
           return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Retrieve the validated input...
        $validated = $validator->validated();

        DB::beginTransaction();
        foreach ($validated['beneficiaries'] as $id => $name) {
            try {
                DB::table('beneficiaries')->where('id', '=', $id)
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

        Session::flash('succes', 'Beneficiaries Updated');

        return redirect()->route('application.beneficiaries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
