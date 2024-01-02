<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class InvoiceEmail extends Mailable
{
    public $user;
    public $invoiceLink;

    public function __construct($user, $invoiceLink, $transaction, $typeOfServiceName)
    {
        $this->user = $user;
        $this->invoiceLink = $invoiceLink;
        $this->transaction = $transaction;
        $this->typeOfServiceName = $typeOfServiceName;
    }

    public function build()
    {
        return $this->view('emails.invoice')->subject('Invoice for Service')->with([
            'user' => $this->user,
            'invoiceLink' => $this->invoiceLink,
            'transaction' => $this->transaction,
            'typeOfServiceName' => $this->typeOfServiceName,
        ]);
    }
}
