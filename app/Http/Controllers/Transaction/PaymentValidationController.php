<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Models\UserMotorcycle;
use App\Http\Controllers\Controller;

class PaymentValidationController extends Controller
{
    public function showPaymentValidationForm($transactionId)
    {
        $userMotorcycles = UserMotorcycle::where('user_id', '=', auth()->user()->id)->get();
        return view('transactions.payment_validation_form', compact('transactionId', 'userMotorcycles'));
    }

    public function processPaymentValidation(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'user_motorcycle_id' => 'required',
            'total_amount' => 'required',
            'payment_method' => 'required',
            'payment_proof' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048', // Adjust file types and size as needed
        ]);

        // Handle file upload
        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs');

        // Update the transaction with payment validation details
        $transaction = Transaction::find($request->input('transaction_id'));
        $transaction->user_motorcycle_id = $validatedData['user_motorcycle_id'];
        $transaction->total_amount = $validatedData['total_amount'];
        $transaction->payment_method = $validatedData['payment_method'];
        $transaction->payment_proof = $paymentProofPath;
        $transaction->payment_status = 'pending'; // You can update this based on your workflow
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Payment validation submitted successfully');
    }
}
