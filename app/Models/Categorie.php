<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    // Si tu veux préciser une table différente (si elle ne suit pas la convention de nommage)
    // protected $table = 'categories';

    // Si tu veux désactiver la gestion des timestamps (si tu ne veux pas de colonnes created_at et updated_at)
    // public $timestamps = false;

    // La table "categories" utilise un ID auto-incrémenté et non une autre colonne pour l'identifiant
    protected $fillable = ['nom']; // Champs que tu veux mass-assignable

    /**
     * Relation avec les vidéos
     */
    public function videos()
    {
        return $this->hasMany(Video::class, 'categorie_id'); // Une catégorie peut avoir plusieurs vidéos
    }
}
