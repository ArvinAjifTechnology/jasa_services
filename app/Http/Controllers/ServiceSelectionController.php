<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // ...

        return redirect()->route('transaction_form', ['service_id' => $selectedServiceId]);
    }
}
