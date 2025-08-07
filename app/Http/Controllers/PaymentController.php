<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Display all payments
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    // Show form to create a new payment
    public function create()
    {
        return view('payments.create');
    }

    // Store a new payment
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required|string|max:255|unique:payment,matricule',
            'amount' => 'required|numeric|min:0',
        ]);

        Payment::create([
            'matricule' => $request->matricule,
            'amount' => $request->amount,
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }
}