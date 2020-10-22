<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                ['name'=>'User1','email'=>'user1@mail.com','password'=>'12345678'],
                ['name'=>'User2','email'=>'user2@mail.com','password'=>'12345678'],
                ['name'=>'User3','email'=>'user3@mail.com','password'=>'12345678'],
                ['name'=>'User4','email'=>'user4@mail.com','password'=>'12345678']
            ]
        );
    }
}
