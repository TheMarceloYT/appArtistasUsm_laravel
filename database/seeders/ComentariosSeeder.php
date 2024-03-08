<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void 
    {
        DB::table('comentarios')->insert([
            ['comentario'=>'sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu', 'create_at'=>Carbon::now(), 'imagen_id'=>3, 'user_fk'=>'ellieHappy23'],
            ['comentario'=>'pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial exam', 'create_at'=>Carbon::now(), 'imagen_id'=>6, 'user_fk'=>'ellieHappy23'],
            ['comentario'=>'perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', 'create_at'=>Carbon::now(), 'imagen_id'=>3, 'user_fk'=>'JohnWick'],
            ['comentario'=>'ken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound', 'create_at'=>Carbon::now(), 'imagen_id'=>3, 'user_fk'=>'TheMarceloYT'],
            ['comentario'=>'ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Qui', 'create_at'=>Carbon::now(), 'imagen_id'=>1, 'user_fk'=>'subZero34'],
            ['comentario'=>'ad minima veniam, quis nostrum exercitationem ullam corporis suscipit', 'create_at'=>Carbon::now(), 'imagen_id'=>1, 'user_fk'=>'ellieHappy23'],
            ['comentario'=>'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium', 'create_at'=>Carbon::now(), 'imagen_id'=>2, 'user_fk'=>'kratosGod56'],
            ['comentario'=>'explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a', 'create_at'=>Carbon::now(), 'imagen_id'=>2, 'user_fk'=>'JohnWick'],
            ['comentario'=>'easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being a', 'create_at'=>Carbon::now(), 'imagen_id'=>4, 'user_fk'=>'alex1243'],
            ['comentario'=>'pain, but because occasionally circumstances occur in which toil um exercitationem ullam corporis s', 'create_at'=>Carbon::now(), 'imagen_id'=>4, 'user_fk'=>'TheMarceloYT'],
            ['comentario'=>'occasionally circumstances occur in which toil and pain can procus nostrum exercitati', 'create_at'=>Carbon::now(), 'imagen_id'=>5, 'user_fk'=>'kratosGod56'],
            ['comentario'=>'but because occasionally circumstances occuos qui ratione voluptatem sequi nesciunt. N', 'create_at'=>Carbon::now(), 'imagen_id'=>5, 'user_fk'=>'JohnWick'],
            ['comentario'=>'ain to you how all this mistaken i', 'create_atquuntur magni dolores eos qui rati'=>Carbon::now(), 'imagen_id'=>5, 'user_fk'=>'ellieHappy23'],
            ['comentario'=>'eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, a', 'create_at'=>Carbon::now(), 'imagen_id'=>5, 'user_fk'=>'alex1243'],
            ['comentario'=>' omnis iste natus error sit voluptbecause occasionally circums', 'create_at'=>Carbon::now(), 'imagen_id'=>6, 'user_fk'=>'subZero34']
        ]);
    }
}
