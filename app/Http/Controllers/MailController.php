<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 30/04/2018
 * Time: 14:50
 */

namespace App\Http\Controllers;


use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Snowfire\Beautymail\Beautymail;

class MailController
{


    //Email permettant de renvoyer un nouveau mot de passe
    public function sendPassword(\Illuminate\Http\Request $request)
    {
        if (!Auth::check()) {
            $new_pass = str_random(8);
            $user = User::where('email', $request->email)->first();
            if($user) {
                // TODO MODIFIER EXPE ET API MAILJET
                $client = new Client();
                $body = [
                    'FromEmail' =>
                        'simonhajek88@gmail.com',

                    'to' => $user->email,
                    'Subject' => "Génération d'un nouveau mot de passe!",
                    "html-part" => "<h3>Bonjour " . $user->name . "</h3><br />
                    Nouveau mot de passe : " . $new_pass . "<br> Vous pouvez à présent vous connecter avec ce mot de passe puis le changer par la suite.
"
                ];

                $result = $client->post('https://api.mailjet.com/v3/send', ['headers' => [
                    'Content-type' => 'application/json',

                ],
                    'auth' => [Config::get('constants.PUB_MAILJET'), Config::get('constants.SEC_MAILJET')],

                    'body' => json_encode($body)
                ]);

                $user->password = bcrypt($new_pass);
                $user->save();
            }
        }
        return redirect('backoffice/login');
    }

    //Envoi de l'email de confirmation d'inscription
    public function confirm_register_customer(){
        //TODO On peut remplacer par n'importe quelle vue, n'importe quel css
        $client = new Client();
        $body = [
            'FromEmail' =>
                'simonhajek88@gmail.com',

            'to' => 'testdeliver@mailinator.com',
            'Subject' => "Génération d'un nouveau mot de passe!",
            "html-part" => view('emails.confirmation_register_customer')->render()
        ];

        $result = $client->post('https://api.mailjet.com/v3/send', ['headers' => [
            'Content-type' => 'application/json',

        ],
            'auth' => [Config::get('constants.PUB_MAILJET'), Config::get('constants.SEC_MAILJET')],

            'body' => json_encode($body)
        ]);
    }

    //Envoi de l'email de confirmation d'un driver
    public static function confirm_driver_email_address($driver, $token) {
        $client = new Client();
        $body = [
            'FromEmail' =>
                'simonhajek88@gmail.com',

            'to' => 'testdeliver@yopmail.com',
            'Subject' => "Confirmation de votre adresse mail",
            "html-part" => view('emails.confirmation_email_driver')->with(['token' => $token, 'driver' => $driver])->render()
        ];

        $client->post('https://api.mailjet.com/v3/send', ['headers' => [
            'Content-type' => 'application/json',

        ],
            'auth' => [Config::get('constants.PUB_MAILJET'), Config::get('constants.SEC_MAILJET')],

            'body' => json_encode($body)
        ]);
    }

    //Envoir de l'email de confirmation d'un customer
    public static function confirm_customer_email_address($customer, $token) {
        $client = new Client();
        $body = [
            'FromEmail' =>
                'simonhajek88@gmail.com',

            'to' => 'testdeliver@yopmail.com',
            'Subject' => "Confirmation de votre adresse mail",
            "html-part" => view('emails.confirmation_email_customer')->with(['token' => $token, 'customer' => $customer])->render()
        ];

        $client->post('https://api.mailjet.com/v3/send', ['headers' => [
            'Content-type' => 'application/json',

        ],
            'auth' => [Config::get('constants.PUB_MAILJET'), Config::get('constants.SEC_MAILJET')],

            'body' => json_encode($body)
        ]);
    }

    //Reset du password d'un ut
    public static function reset_password_email($token) {
        $client = new Client();
        $body = [
            'FromEmail' =>
                'simonhajek88@gmail.com',

            'to' => 'testdeliver@yopmail.com',
            'Subject' => "Réinitialisation de votre mot de passe",
            "html-part" => view('emails.password_reset_email')->with(['token' => $token])->render()
        ];

        $client->post('https://api.mailjet.com/v3/send', ['headers' => [
            'Content-type' => 'application/json',

        ],
            'auth' => [Config::get('constants.PUB_MAILJET'), Config::get('constants.SEC_MAILJET')],

            'body' => json_encode($body)
        ]);
    }

    public static function contact_email($nom, $prenom, $email, $message) {
        $client = new Client();
        $body = [
            'FromEmail' =>
                'randy@sup.sarl',

            'to' => 'randy@sup.sarl',
            'Subject' => "Contact de " . $nom . " " . $prenom,
            "html-part" => view('emails.contact')->with(['message' => $message, 'nom' => $nom, 'prenom' => $prenom, 'email' => $email])->render()
        ];

        $client->post('https://api.mailjet.com/v3/send', ['headers' => [
            'Content-type' => 'application/json',

        ],
            'auth' => [Config::get('constants.PUB_MAILJET'), Config::get('constants.SEC_MAILJET')],

            'body' => json_encode($body)
        ]);
    }
}