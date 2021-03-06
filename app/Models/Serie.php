<?php


namespace App\Models;

use App\Models\Episodio;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $perPage = 5;
    protected $appends = ['links'];

    public function episodios(){
        return $this.hasMany(Episodio::class);
    }
    public function getLinksAttribute($links): array
    {
        return [
            'self' => '/api/series/' . $this->id,
            'episodios' => '/api/series/' . $this->id .'/episodios'
        ];
    }
}
