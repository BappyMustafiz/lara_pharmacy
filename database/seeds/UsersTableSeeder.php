<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Bappy',
            'email' => 'bappy@sarosit.com',
            'password' => bcrypt(123456),
            'user_type_id' => 1,
            'status' => 'Active',
        ]);
    }
}
