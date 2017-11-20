<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Sichikawa\LaravelSendgridDriver\SendGrid;


class UserRegistrationMail extends Mailable
{
    use SendGrid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        
        ->subject('Bem vindo ao easy pets')
        ->from('victor@atrace.com.br')
        ->to(['victor@atrace.com.br'])
        ->embedData([
            'custom_args' => [
                'user_id' => "123" // Make sure this is a string value
            ],
            'template_id' => 'f702e656-3030-4ed5-a3a2-aae253bac2cc'
        ], 'sendgrid/x-smtpapi');
    }
}
