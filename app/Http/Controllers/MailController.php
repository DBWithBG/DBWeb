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
use Snowfire\Beautymail\Beautymail;

class MailController
{


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

    public function confirm_register_customer(){
        $client = new Client();
        $body = [
            'FromEmail' =>
                'simonhajek88@gmail.com',

            'to' => 'simonhajek88@gmail.com',
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
}