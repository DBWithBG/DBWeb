<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriqueNotification extends Model
{
    protected $table = 'historique_notifications';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'createur',
        'titre',
        'contenu',
        'cible',
        'moyen',
        'created_at',
        'updated_at',
        'status',
        'hits'
    ];
}
