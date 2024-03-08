<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';
    public $timestamps = false;

    //un comentario pertenece a una imagen
    public function imagen():BelongsTo
    {
        return $this->belongsTo(Imagen::class, 'imagen_id');
    }

    //un comentario pertenece a una cuenta
    public function cuenta():BelongsTo
    {
        return $this->belongsTo(Cuenta::class, 'user_fk');
    }
}
