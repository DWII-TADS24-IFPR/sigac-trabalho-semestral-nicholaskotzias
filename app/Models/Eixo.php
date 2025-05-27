<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eixo extends Model
{
    protected $table = 'eixos';
    protected $fillable = ['nome'];

    public function eixos(){
        return $this->hasMany(Curso::class);
    }
}
