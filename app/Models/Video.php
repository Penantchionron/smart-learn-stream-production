<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable = [
        'titre',
        'description',
        'url',
        'categorie_id',
        'user_id',
        'video_file',
        'youtube_id',
        'premium',
    ];
    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }

    public function favoris() {
        return $this->hasMany(Favori::class);
    }

    public function commentaires() {
        return $this->hasMany(Commentaire::class);
    }

}
