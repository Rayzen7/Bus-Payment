<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $payment = Payment::where('user_id', $user->id)->with('user', 'bus')->get();
        return view('payment.history', compact('payment'));
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
    public function store(Request $request, $id)
    {
        $user = Auth::user();
        $validateData = Validator::make($request->all(), [
            'user_id' => 'exists:users,id',
            'bus_id' => 'exists:buses,id',
            'name' => 'required',
            'email' => 'required|email',
            'method' => 'required',
            'no_hp' => 'required',
            'sheets' => 'required',
            'total_price' => 'required',
        ], [
            'required' => 'Kolom ini harus diisi'
        ]);

        if ($validateData->fails()) {
            return redirect()->route('indexDashboard')->with('error', $validateData->errors());
        }

        Payment::create([
            'user_id' => $user->id,
            'bus_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'method' => $request->method,
            'no_hp' => $request->no_hp,
            'sheets' => $request->sheets,
            'total_price' => $request->total_price,
        ]);

        return redirect()->route('indexDashboard')->with('success', 'Transaksi Berhasil!');
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
