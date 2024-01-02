<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data transaksi terbaru
        $recentTransactions = Transaction::latest()->take(5)->get();

        // Hitung total pengguna
        $totalUsers = User::count();

        // Hitung total transaksi
        $totalTransactions = Transaction::count();

        return view('dashboard.index', compact('recentTransactions', 'totalUsers', 'totalTransactions'));
    }
}

