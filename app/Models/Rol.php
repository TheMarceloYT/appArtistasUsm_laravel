<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';
    public $timestamps = false;

    //un rol pertenece a muchos users
    public function users():HasMany
    {
        return $this->hasMany(Cuenta::class, 'id_rol');
    }
}
