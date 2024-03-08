<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cuentas')->insert([
            ['user'=>'TheMarceloYT', 'password'=>Hash::make('1234'), 'imagen'=>'TheMarceloYT.jpg', 'nombre'=>'Marcelo', 'apellido'=>'Escobar', 'gmail'=>'marcelopro@gmail.com', 'create_at'=>Carbon::now(), 'id_rol'=>1],
            ['user'=>'JohnWick', 'password'=>Hash::make('4321'), 'imagen'=>'jw.png', 'nombre'=>'Jhon', 'apellido'=>'Wick', 'gmail'=>'wick@gmail.com', 'create_at'=>Carbon::now(), 'id_rol'=>1],
            ['user'=>'alex1243', 'password'=>Hash::make('alexmercer'), 'imagen'=>'alex.jpg', 'nombre'=>'Alex', 'apellido'=>'Mercer', 'gmail'=>'alexkiller@gmail.com', 'create_at'=>Carbon::now(), 'id_rol'=>2],
            ['user'=>'kratosGod56', 'password'=>Hash::make('godkiller'), 'imagen'=>'kratos.jpg', 'nombre'=>'Kratos', 'apellido'=>'Kratos', 'gmail'=>'godofwar@gmail.com', 'create_at'=>Carbon::now(), 'id_rol'=>2],
            ['user'=>'subZero34', 'password'=>Hash::make('hielo'), 'imagen'=>'sub.jpg', 'nombre'=>'Bi', 'apellido'=>'Han', 'gmail'=>'subzerojuasjuas@gmail.com', 'create_at'=>Carbon::now(), 'id_rol'=>2],
            ['user'=>'ellieHappy23', 'password'=>Hash::make('joel'), 'imagen'=>'ellie.jpg', 'nombre'=>'Ellie', 'apellido'=>'Williams', 'gmail'=>'ellie@gmail.com', 'create_at'=>Carbon::now(), 'id_rol'=>3]
        ]);
    }
}
