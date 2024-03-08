<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;

class Cuenta extends Authenticable
{
    use HasFactory, SoftDeletes;

    protected $table = 'cuentas';
    protected $primaryKey = 'user';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false; 

    //un user pertenece a un rol 
    public function rol():BelongsTo
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    //un user puede tener varias imagenes
    public function imagen():HasMany
    {
        return $this->hasMany(Imagen::class, 'user_fk');
    }

    //una cuenta puede tener muchos comentarios
    public function comentario_user():HasMany
    {
        return $this->hasMany(Comentario::class, 'user_fk');
    }
}
