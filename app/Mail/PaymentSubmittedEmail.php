<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class PaymentSubmittedEmail extends Mailable
{
    public $user;
    public $transaction;

    public function __construct($user,$transaction)
    {
        $this->user = $user;
        $this->transaction = $transaction;
    }

    public function build()
    {
        return $this->view('emails.payment_submitted')->subject('Invoice for Service')->with([
            'user' => $this->user,
            'transaction' => $this->transaction,
        ]);
    }
}
