<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 30/04/2018
 * Time: 14:50
 */

namespace App\Http\Controllers;


use App\Customer;
use App\Delivery;
use App\Driver;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MailController
{

    /**
     * Fonction permettant d'envoyer un ou plusieurs emails
     * @param $users tableau d'ids d'utilisateur a qui envoyer l'email
     * @param $subject le sujet de l'email
     * @param $html le contenu (html supporté) de l'email
     *
     * retourne le statut de l'envoi de tous les emails avec en clé l'id de l'utilisateur
     */
    public static function send_email($users, $subject, $html){
        $client = new Client();
        $return = [];
        foreach ($users as $user){
            $o_user = User::find($user);
            //Préparation du body pour l'envoi
            $body = [
                'fromEmail' => Config::get('constants.SENDER_EMAIL'),
                'to' => $o_user->email,
                'Subject' => $subject,
                'html-part' => $html
            ];

            //Envoi de l'email
            $return[$o_user->id] =  $client->post('https://api.mailjet.com/v3/send', ['headers' => [
                'Content-type' => 'application/json',

            ],
                'auth' => [Config::get('constants.PUB_MAILJET'), Config::get('constants.SEC_MAILJET')],

                'body' => json_encode($body)
            ]);
        }
        return $return;
    }

    //Envoi un email à tous les driver qui ont des comptes valides et sont prêts à livrer
    public static function send_email_all_drivers($subject, $html){
        $drivers = Driver::where('deleted', '0')->where('is_op', '1')->get();
        $users = [];
        foreach ($drivers as $driver){
            array_push($users, $driver->user->id);
        }

        if(sizeof($users) == 0){
            Session::flash('success', 'Aucun utilisateur choisi');
            return redirect()->back();
        }
        return self::send_email($users, $subject, $html);
    }

    //Envoi un email à tous les customers qui ont des comptes valides
    public static function send_email_all_customers($subject, $html){
        $customers = Customer::all();
        $users = [];
        foreach ($customers as $customer){
            if($customer->user->is_confirmed) array_push($users, $customer->user->id);
        }
        if(sizeof($users) == 0){
            Session::flash('success', 'Aucun utilisateur choisi');
            return redirect()->back();
        }
        return self::send_email($users, $subject, $html);
    }

    public static function send_customer_facture($delivery_id, $o_user){
        $path = FactureController::genererFactureDelivery($delivery_id);
        $attachments = [];
        if (File::exists($path)) {
            array_push($attachments,
                [
                    'Content-type' => "application/pdf",
                    'Filename' => "facture.pdf",
                    'content' => base64_encode(file_get_contents($path))
                ]
            );
        }
        $delivery = Delivery::find($delivery_id);

        $client = new Client();
        $return = [];
        //Préparation du body pour l'envoi
        $body = [
            'fromEmail' => Config::get('constants.SENDER_EMAIL'),
            'to' => $o_user->email,
            'Subject' => 'Confirmation commande deliverbag n°'.$delivery->num_facture,
            'html-part' => "<h3>Bonjour " . $o_user->name . "</h3><br />
                    La commande n°".$delivery->num_facture." est confirmée. Vous trouverez ci-joint la facture.
",
            'Attachments' => $attachments
        ];

        //Envoi de l'email
        $return[$o_user->id] =  $client->post('https://api.mailjet.com/v3/send', ['headers' => [
            'Content-type' => 'application/json',

        ],
            'auth' => [Config::get('constants.PUB_MAILJET'), Config::get('constants.SEC_MAILJET')],

            'body' => json_encode($body)
        ]);
    }




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
                        Config::get('constants.SENDER_EMAIL'),

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

    //TODO DEPRECATED I THINK
    //Envoi de l'email de confirmation d'inscription
    public function confirm_register_customer(){
        //TODO On peut remplacer par n'importe quelle vue, n'importe quel css
        $client = new Client();
        $body = [
            'FromEmail' =>
                Config::get('constants.SENDER_EMAIL'),

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
                Config::get('constants.SENDER_EMAIL'),

            'to' => $driver->user->email,
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
                Config::get('constants.SENDER_EMAIL'),

            'to' => $customer->user->email,
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
    public static function reset_password_email($token, $user) {
        $client = new Client();
        $body = [
            'FromEmail' =>
                Config::get('constants.SENDER_EMAIL'),

            'to' => $user->email,
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
                Config::get('constants.SENDER_EMAIL'),

            'to' => $email,
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