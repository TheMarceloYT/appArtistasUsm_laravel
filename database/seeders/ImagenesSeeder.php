<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('imagenes')->insert([
            ['titulo'=>'Mostrando mi poder', 'descripcion'=>'Pintura la cual demuestra todo el poder del dios de la guerra', 'imagen'=>'kratos_paint1.jpg', 'likes'=>23, 'create_at'=>Carbon::now(), 'user_fk'=>'kratosGod56'],
            ['titulo'=>'Batalla eterna', 'descripcion'=>'Pintura mostrando la rivalidad infinita con mi enemigo eterno', 'imagen'=>'subzero_paint1.jpg', 'likes'=>11, 'create_at'=>Carbon::now(), 'user_fk'=>'subZero34'],
            ['titulo'=>'Soy imparable', 'descripcion'=>'Pintura mostrando mi increible letalidad (risa de villano)', 'imagen'=>'alex_paint1.jpg', 'likes'=>3, 'create_at'=>Carbon::now(), 'user_fk'=>'alex1243'],
            ['titulo'=>'Posanding', 'descripcion'=>'Alguna mujer por alli?', 'imagen'=>'kratos_paint2.jpg', 'likes'=>45, 'create_at'=>Carbon::now(), 'user_fk'=>'kratosGod56'],
            ['titulo'=>'Batalla eterna parte 2', 'descripcion'=>'Pintura mostrando la rivalidad infinita con mi enemigo eterno, pero otra version', 'imagen'=>'subzero_paint2.jpg', 'likes'=>98, 'create_at'=>Carbon::now(), 'user_fk'=>'subZero34'],
            ['titulo'=>'Soy imparable x2', 'descripcion'=>'Pintura mostrando mi increible letalidad (risa de villano), pero con mas detalles', 'imagen'=>'alex_paint2.jpg', 'likes'=>76, 'create_at'=>Carbon::now(), 'user_fk'=>'alex1243'],
        ]);
    }
}
