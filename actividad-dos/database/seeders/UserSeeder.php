<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**User::factory()->create([
            'nombre' => 'Test User',
            'email' => 'seguridadweb@campusviu.es',
            'password' => 'S3gur1d4d?W3b'
        ]);*/
        DB::table('users')->insert([
            'nombre' => 'Test User',
            'apellidos'=> 'LastName',
            'dni' => '12345678L',
            'email' => 'seguridadweb@campusviu.es',
            'password' => 'S3gur1d4d?W3b'
        ]);
    }
}
