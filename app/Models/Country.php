<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function user(){
        return $this->hasMany(User::class);
    }
}
