<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    //
    protected $fillable = [
        'montant',
        'date_paiement',
        'moyen',
        'statut',
        'user_id',
    ];
    public function utilisateur() {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }
    
}
