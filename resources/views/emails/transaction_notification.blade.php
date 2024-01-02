<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Notification</title>
</head>
<body>
    <h2>Transaction Notification</h2>
    <p>Hi, there!</p>
    
    <p>Your transaction details:</p>
    
    <ul>
        <li>Transaction Code: {{ $transaction->transaction_code }}</li>
        <li>Transaction ID: {{ $transaction->id }}</li>
        <li>Nama: {{ $transaction->user->full_name }}</li>
        <li>User Motorcycle ID: {{ $transaction->user_motorcycle_id }}</li>
        <li>Type of Service ID: {{ $transaction->type_of_service_id }}</li>
        <li>Total Amount: {{ $transaction->total_amount }}</li>
        <li>Status: {{ $transaction->status }}</li>
        <li>Queue Number: {{ $transaction->queue_number }}</li>
        <li>Payment Method: {{ $transaction->payment_method }}</li>
        <li>Payment Status: {{ $transaction->payment_status }}</li>
    </ul>
    
    <p>Thank you for using our service!</p>
</body>
</html>
