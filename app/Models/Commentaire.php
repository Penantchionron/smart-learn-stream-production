<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    //
    protected $fillable = [
        'contenu',
        'date_commentaire',
        'user_id',
        'video_id',
    ];
    public function utilisateur() {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }
    
    public function video() {
        return $this->belongsTo(Video::class);
    }
    
}
