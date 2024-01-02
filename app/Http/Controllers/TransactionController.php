<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionNotification;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    public function index()
    {
        if(Gate::allows('admin')){
            $transactions = Transaction::latest()->paginate(10);
        }elseif (Gate::allows('user')) {
            $transactions = Transaction::where('user_id', '=', auth()->user()->id)->get();
        }elseif (Gate::allows('mechanic')){
            $transactions = Transaction::where('mechanic_id', '=', auth()->user()->id)->get();
        }

        return view('transactions.index', compact('transactions'));
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $mechanics = User::where('role','=', 'mechanic')->pluck('id')->toArray(); 
        return view('transactions.edit', compact('transaction', 'mechanics'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            // Add validation rules based on your model attributes
            'payment_status' => 'string',
            'status' => 'required',
        ]);

        $mechanics = User::where('role','=', 'mechanic')->pluck('id')->toArray();
        // dd($mechanics);
        $transaction->mechanic_id = $mechanics[array_rand($mechanics)];
        $transaction->update($validatedData);
        
        $mechanic_email = User::where('id','=', $transaction->mechanic_id)->first();
        $user_email = User::where('id','=', $transaction->user_id)->first();
        
        Mail::to($mechanic_email->email)->send(new TransactionNotification($transaction));
        Mail::to($user_email->email)->send(new TransactionNotification($transaction));
        return redirect()->route('transactions.index')->with('status', 'Transaction updated successfully');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully');
    }
}
