<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded =['id','create_at','updated_at'];

    //relacion uno a muchos inversa
    public function post(){
        return $this->belongsTo(Post::class);
    }

   //relacion uno a muchos inversa
   public function user(){
    return $this->belongsTo(User::class);
}

}
