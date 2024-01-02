<?php

namespace App\Http\Controllers\Transaction;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\UserMotorcycle;
use App\Http\Controllers\Controller;
use App\Mail\PaymentSubmittedEmail;
use Illuminate\Support\Facades\Mail;

class PaymentSubmittedController extends Controller
{
    public function showPaymentSubmittedForm($transactionId)
    {
        $userMotorcycles = UserMotorcycle::where('user_id', '=', auth()->user()->id)->get();
        $transaction = Transaction::find($transactionId)->first();
        return view('transactions.payment_submitted_form', compact('transactionId', 'userMotorcycles', 'transaction'));
    }

    public function processPaymentSubmitted(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'user_motorcycle_id' => 'required',
            'total_amount' => 'required',
            'payment_method' => 'required',
            'payment_proof' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048', // Adjust file types and size as needed
        ]);
        $admins = User::where('role', '=', 'admin')->get();
        // Handle file upload
        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');

        // Update the transaction with payment validation details
        $transaction = Transaction::find($request->input('transaction_id'));
        $transaction->user_motorcycle_id = $validatedData['user_motorcycle_id'];
        $transaction->total_amount = $validatedData['total_amount'];
        $transaction->payment_method = $validatedData['payment_method'];
        $transaction->payment_proof = $paymentProofPath;
        $transaction->payment_status = 'paid'; // You can update this based on your workflow
        $transaction->status = 'pending'; // You can update this based on your workflow
        $transaction->update();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new PaymentSubmittedEmail($admin, $transaction));
        }
        return redirect()->route('transactions.index')->with('success', 'Payment validation submitted successfully');
    }
}
