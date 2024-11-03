<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => 'さかな',
            'mail' => 'sakana@gmail.com',
            'password' => bcrypt('sakana0000'),

        ]);
    }
}
