<?php

namespace App\Http\Controllers\Transaction;


use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TypeOfService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceEmail;

class ServiceSelectionController extends Controller
{
    public function showServiceSelection()
    {
        $services = TypeOfService::all();
        return view('transactions.service-selection', compact('services'));
    }

    public function processServiceSelection(Request $request)
{
    // Proses pemilihan layanan disini
    $selectedServiceId = $request->input('service');

    $typeOfService = TypeOfService::find($selectedServiceId);
    // Misalnya, ambil $transactionId dari tabel transaksi
    $transaction = Transaction::create([
        'user_id' => Auth::id(),
        // Gantilah dengan cara mendapatkan user motorcycle ID
        'type_of_service_id' => $typeOfService->id,
        'total_amount' => $typeOfService->price,
        // ...
    ]);

    $transactionId = $transaction->id; // Ambil ID transaksi yang baru dibuat
    $typeOfServiceName = $typeOfService->name;

    $user = Auth::user();
    $invoiceLink = route('payment_validation_form', ['transaction_id' => $transactionId]);

    Mail::to($user->email)->send(new InvoiceEmail($user, $invoiceLink, $transaction, $typeOfServiceName));

    // return redirect()->route('transaction_form', ['service_id' => $selectedServiceId])
    //     ->with('success', 'Invoice sent successfully.');
    return redirect()->back()
        ->with('success', 'Invoice sent successfully.');
}

}
