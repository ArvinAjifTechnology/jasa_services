<!-- resources/views/emails/payment_validation.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Validation Notification</title>
</head>
<body>
    <h2>Payment Validation Notification</h2>

    <p>Dear Admin,</p>

    <p>The payment validation for the transaction with the following details has been submitted:</p>

    <ul>
        <li><strong>Transaction Code:</strong> {{ $transaction->transaction_code }}</li>
        <li><strong>User Motorcycle:</strong> {{ $transaction->userMotorcycle->user_motorcycle_brand }}</li>
        <li><strong>Total Amount:</strong> {{ formatCurrency($transaction->total_amount) }}</li>
        <li><strong>Payment Method:</strong> {{ $transaction->payment_method }}</li>
    </ul>

    <p>Please review and process accordingly.</p>

    <p>Thank you for using our application!</p>
</body>
</html>
