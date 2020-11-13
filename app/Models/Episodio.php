<?php

namespace App\Models;

use App\Serie;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'nome', 'assistido'];

    public function serie(){
        return $this->belongsTo(Serie::class);
    }
}
