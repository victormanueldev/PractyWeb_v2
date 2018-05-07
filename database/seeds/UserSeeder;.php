<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            'Usuario_id' => 2,
            'Nombres' => 'Victor Manuel',
            'Apellidos' => 'Arenas Lopez',
            'password' => bcrypt('123'),
            'login' => 'vmdev' 
        ];

        DB::table('useradmin')->insert($user);
    }
}
