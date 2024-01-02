<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class TransactionNotification extends Mailable
{

    public $transaction;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.transaction_notification')
            ->subject('Transaction Email')->with([
                'transaction' => $this->transaction,
            ]);;
    }
}
