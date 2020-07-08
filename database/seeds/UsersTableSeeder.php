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
            'name' => 'Văn Lợi',
            'email' => 'loidinh174@gmail.com',
            'password' => bcrypt('viettinbank'),
            'admin' => 1
        ]);
    }
}
