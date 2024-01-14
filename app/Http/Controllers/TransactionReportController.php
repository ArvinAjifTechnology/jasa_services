<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionReportController extends Controller
{
    public function index()
    {
        $transactions = Transaction::query();
        $sum_of_total_amount = 0; // Assuming you want to calculate the sum of total amounts
        return view('transaction-report.index', compact('transactions', 'sum_of_total_amount'));
    }

    public function generateReport(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $search = $request->input('search');

        $transactions = Transaction::selectRaw("transactions.*,
                        CONCAT(users.first_name, ' ', users.last_name) AS user_full_name,
                        users.*,
                        user_motorcycles.*,
                        type_of_services.*,
                        SUM(transactions.total_amount) AS total_revenue")
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->leftJoin('user_motorcycles', 'transactions.user_motorcycle_id', '=', 'user_motorcycles.id')
            ->leftJoin('type_of_services', 'transactions.type_of_service_id', '=', 'type_of_services.id')
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('transactions.created_at', [$startDate, $endDate]);
            })
            ->where(function ($query) use ($search) {
                $query->where('transactions.transaction_code', 'LIKE', '%' . $search . '%')
                    ->orWhere('transactions.status', 'LIKE', '%' . $search . '%')
                    ->orWhere('users.username', 'LIKE', '%' . $search . '%')
                    ->orWhere('user_motorcycles.motorcycle_brand', 'LIKE', '%' . $search . '%')
                    ->orWhere('type_of_services.type_of_service', 'LIKE', '%' . $search . '%');
            })
            ->groupBy('transactions.id')
            ->get();

            $sum_of_total_amount = Transaction::where('status', 'completed')->sum('total_amount');


        return view('transaction-report.index', compact('transactions', 'startDate', 'endDate', 'search', 'sum_of_total_amount'));
    }
}
