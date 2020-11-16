<?php

namespace App\Models;

use App\Serie;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'nome', 'assistido', 'serie_id'];
    protected $appends = ['links'];

    public function serie(){
        return $this->belongsTo(Serie::class);
    }

    public function getAssistidoAttribute($assistido) :bool
    {
        return $assistido;
    }

    public function getLinksAttribute($links): array
    {
        return [
            'self' => '/api/episodios/' . $this->id,
            'series' => '/api/series/' . $this->serie_id
        ];
    }
}
