<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
//PERMITE USAR LOS METODOS DE SPATIE
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles; //PARA USAR METODOS DE ASIGNACION DE ROLES

    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function post(){
        return $this->hasMany(Post::class);
    }

    //relacion uno a muchos// 1 usuario puede terner varios anuncios
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    
    //relacion uno a muchos inversa
    public function country(){
        return $this->belongsTo(Country::class);
    }
    
    public function adminlte_profile_url()
    {
        //$countries = Country::pluck('id','name');
        return route('profile.show');
    }
}
