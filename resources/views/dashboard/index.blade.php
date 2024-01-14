<!-- resources/views/dashboard.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Dashboard</h2>
@can('admin')
        <div class="row">
            <h1> Selamat Datang, {{ auth()->user()->full_name }}</h1>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Recent Transactions</div>
                    <div class="card-body">
                        <!-- Tampilkan daftar transaksi terbaru di sini -->
                        <ul>
                            @foreach($recentTransactions as $transaction)
                                <li>{{ $transaction->id }} - {{ $transaction->total_amount }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Statistics</div>
                    <div class="card-body">
                        <!-- Tampilkan statistik atau informasi lainnya di sini -->
                        <p>Total Users: {{ $totalUsers }}</p>
                        <p>Total Transactions: {{ $totalTransactions }}</p>
                        <!-- Tambahan statistik lainnya sesuai kebutuhan -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan

@can('user')
<div class="row">
    <div class="col-md-12">
        <h1> Selamat Datang, {{ auth()->user()->full_name }}</h1>
    </div>
</div>
@endcan

@can('mechanic')
<div class="row">
    <div class="col-md-12">
        <h1> Selamat Datang, {{ auth()->user()->full_name }}</h1>
    </div>
</div>
@endcan
@endsection
