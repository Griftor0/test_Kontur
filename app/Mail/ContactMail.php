<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

use App\Models\Contact;

class ContactMail extends Mailable
{
    public $contact;

    public function __construct(Contact $contact) {
        $this->contact = $contact;
    }

    public function build() {
        return $this->subject('Новая заявка')->view('emails.contact');
    }
}
