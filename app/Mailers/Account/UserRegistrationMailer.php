<?

namespace App\Mailers\Account;

use Sichikawa\LaravelSendgridDriver\SendGrid;

use Illuminate\Mail\Mailable;

class UserRegistrationMailer extends Mailable
{
    use SendGrid;

    public function build()
    {
        return $this
            ->view('Untitled_11511210855977')
            ->subject('Bem vindo ao easy pets')
            ->from('victor@atrace.com.br')
            ->to(['victor@atrace.com.br'])
            ->sendgrid([
                'personalizations' => [
                    [
                        'substitutions' => [
                            ':myname' => 's-ichikawa',
                        ],
                    ],
                ],
            ]);
    }
}