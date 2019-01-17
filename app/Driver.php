<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;

class Driver extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'birth_date', 'is_online', 'phone', 'created_at','updated_at', 'user_id','canceled_deliveries',
        'current_lat','current_lng', 'max_bags'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function takeOverDeliveries()
    {
        return $this->hasMany('App\TakeOverDelivery', 'driver_id');
    }

    public function justificatifs() {
        return $this->hasMany('App\Justificatif', 'driver_id');
    }

    /**
     * @return int La chiffre d'affaires du driver
     */
    public function ca() {
        $ca = 0;

        foreach ($this->takeOverDeliveries as $tod) {
            if ($tod->delivery->status == Config::get('constants.TERMINE')) {
                $ca += $tod->delivery->price;
            }
        }

        return $ca;
    }

    /**
     * @return string Une string contenant la note du driver
     */
    public function note() {
        $total = 0;
        $number = 0;
        foreach ($this->takeOverDeliveries as $takeOverDelivery) {
            if ($takeOverDelivery->delivery->rating != null) {
                $total += ($takeOverDelivery->delivery->rating->rating / 10);
                $number++;
            }
        }

        if ($number == 0) return '';
        return '' . ($total / $number);
    }

    public function sortedDeliveries() {
        // On récupère les deliveries du driver ayant le status_id TERMINEE
        $takeOversDeliveries = $this->takeOverDeliveries()->get()->filter(function ($takeOverDelivery) {
            return $takeOverDelivery->delivery->status_id === Config::get('constants.TERMINEE');
        });

        $sorted_deliveries = [];
        foreach ($takeOversDeliveries as $takeOverDelivery) {
            // delivery.delivery.end_date format : 2018-12-14 22:53:00
            // On veux 2018-12
            $end_year_month = explode(" ", $takeOverDelivery->delivery->start_date)[0];
            $end_year_month = substr($end_year_month, 0, 7);
            list($end_year, $end_month) = explode('-', $end_year_month);
            $end_year = intval($end_year);
            $end_month = intval($end_month);
            
            if(!array_key_exists($end_year, $sorted_deliveries)) $sorted_deliveries[$end_year] = [];
            if(!array_key_exists($end_month, $sorted_deliveries[$end_year])) $sorted_deliveries[$end_year][$end_month] = [];
    
            
            array_push($sorted_deliveries[$end_year][$end_month], $takeOverDelivery);
            /*
              [
                2018 => [
                    11 => [deliveries], 
                    12 => [deliveries]
                ], 
                2017 => etc
              ]
              Les deliveries de janvier 2018 seront donc dans $sorted_deliveries[2018][1] 
            */
      
        }

        return $sorted_deliveries;
    }

    /**
     * Permet de récupérer les statistiques d'un chaffeur par mois (Du plus récent au plus vieux)
     * Renvoie un tableau de la forme [
     *     ['year' => 2019, 'month' => 1, 'nb_deliveries' => 3, 'nb_bags' => 5, 'income' => 50.7, 'deliveries' => [...]],
     *     ['year' => 2018, 'month' => 1, 'nb_deliveries' => 3, 'nb_bags' => 5, 'income' => 50.7, 'deliveries' => [...]],
     *     etc...
     * ]
     * @return array
     */
    public function historique() {
        // On va regarder les NB_YEARS dernières année
        $NB_YEARS = 4;

        $sorted_deliveries = $this->sortedDeliveries();

        $current_year = intval(date('Y'));
        $historique = [];

        // On veut les récaps de chaque mois des NB_YEARS dernière année
        for ($year = $current_year; $year >= $current_year - $NB_YEARS; $year = $year - 1) {
            // Pour chaque mois, du plus récent au plus ancient
            for ($month = 12; $month >= 1; $month = $month - 1) {
                // On construit le récap du mois year-month
                // On utilise sorted_deliveries[year][month]

                if (!array_key_exists($year, $sorted_deliveries) || !array_key_exists($month, $sorted_deliveries[$year])) continue;

                $recap_current_month = [
                    'year' => $year,
                    'month' => $month,
                    'nb_deliveries' => count($sorted_deliveries[$year][$month]),
                    'nb_bags' => 0,
                    'income' => 0,
                    'deliveries' => []
                ];

                foreach($sorted_deliveries[$year][$month] as $takeOverDelivery) {
                    $recap_current_month['income'] += $takeOverDelivery->delivery->remuneration_driver;
                    $recap_current_month['nb_bags'] += count($takeOverDelivery->delivery->bags);
                    array_push($recap_current_month['deliveries'], $takeOverDelivery);
                }

                array_push($historique, $recap_current_month);
            }
        } 

        return $historique;
            
    }
}
