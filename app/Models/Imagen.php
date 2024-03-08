<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imagen extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'imagenes';
    public $timestamps = false;

    //una imagen pertenece a un user
    public function user():BelongsTo
    {
        return $this->belongsTo(Cuenta::class, 'user_fk');
    }

    //una imagen puede tener muchos comentarios
    public function comentario():HasMany
    {
        return $this->hasMany(Comentario::class, 'imagen_id');
    }
}
