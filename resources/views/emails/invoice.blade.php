<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Email</title>
    <!-- Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            max-width: 100px;
            margin-right: 10px;
        }
    </style>
</head>

<body style="font-family: Arial, sans-serif;">

    <div class="container mt-4">
        <p>Hello {{ $user->name }},</p>

        <p>Here is your invoice for the service:</p>

        <div class="mb-3">
            <strong>{{ __('Name') }}:</strong> {{ $user->full_name }}<br>
            <strong>{{ __('Email') }}:</strong> {{ $user->email }}<br>
            <strong>{{ __('Username') }}:</strong> {{ $user->username }}<br>
            <strong>{{ __('Gender') }}:</strong>
            @if ($user->gender == 'male')
            <span class="text-primary">{{ __('Male') }}</span>
            @elseif ($user->gender == 'female')
            <span class="text-success">{{ __('Female') }}</span>
            @endif
        </div>

        <p><strong>{{ __('Transaction ID') }}:</strong> {{ $transaction->transaction_code }}</p>
        <p><strong>{{ __('Total Amount') }}:</strong> {{ $transaction->total_amount }}</p>

        <p>Please choose one of the payment methods below and make the payment to the provided account:</p>

        <!-- Shopee Pay -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="logo-container">
                    <img src="https://th.bing.com/th/id/OIP.P-bDzBd54iQzV2SQF3Mf-gHaD4?rs=1&pid=ImgDetMain" alt="Shopee Pay Logo" class="logo">
                    <strong>Shopee Pay:</strong> 087678906789
                </div>
            </div>
        </div>

        <!-- GoPay -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="logo-container">
                    <img src="https://1000logos.net/wp-content/uploads/2021/05/GoPay-Logo.png" alt="GoPay Logo" class="logo">
                    <strong>GoPay:</strong> 087678906789
                </div>
            </div>
        </div>

        <!-- OVO -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="logo-container">
                    <img src="https://th.bing.com/th/id/OIP.GmKqHBdae7jOKq6xrvayxAHaDD?rs=1&pid=ImgDetMain" alt="OVO Logo"
                        class="logo">
                    <strong>OVO:</strong> 087678906789
                </div>
            </div>
        </div>

        <!-- Dana -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="logo-container">
                    <img src="https://logos-download.com/wp-content/uploads/2022/01/Dana_Logo.png" alt="Dana Logo" class="logo">
                    <strong>Dana:</strong> 087678906789
                </div>
            </div>
        </div>

        <!-- BNI Mobile -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="logo-container">
                    <img src="https://th.bing.com/th/id/OIP.AuySA9bVI4sy0WAFfYBSVAAAAA?rs=1&pid=ImgDetMain" alt="BNI Logo" class="logo">
                    <strong>BNI Mobile:</strong> 44515215676
                </div>
            </div>
        </div>

        <!-- BRI -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="logo-container">
                    <img src="https://www.companieshistory.com/wp-content/uploads/2020/10/Bank-Rakyat-Indonesia-Bank-BRI-logo.jpg" alt="BRI Logo" class="logo">
                    <strong>BRI:</strong> 62173816798
                </div>
            </div>
        </div>

        <p>Please click the link below to validate your payment:</p>
        <a href="{{ $invoiceLink }}" class="btn btn-primary" role="button">Validate Payment</a>
    </div>

    <!-- Bootstrap JS and Popper.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
