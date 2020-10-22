<?php

use Illuminate\Database\Seeder;

class EntriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entries')->insert(
            [
                ['name' => 'User1', 'lastname' => 'Mem1', 'email' => 'user1@mail.com',
                    'phone' => '70000000000', 'department' => 'RCSE', 'checkbox' => '1', 'nameOfThesis' => 'Аллилуйя', 'descriptionOfThesis' => 'Иииииииииииии'],

                ['name' => 'User2', 'lastname' => 'Mem2', 'email' => 'user2@mail.com',
                    'phone' => '70000000000', 'department' => 'RCSE', 'checkbox' => '0','nameOfThesis' => null, 'descriptionOfThesis' => null],

                ['name' => 'User3', 'lastname' => 'Mem3', 'email' => 'user3@mail.com',
                    'phone' => '70000000000', 'department' => 'RCSE', 'checkbox' => '1', 'nameOfThesis' => 'Аллилуйя', 'descriptionOfThesis' => 'Иииииииииииии'],

                ['name' => 'User4', 'lastname' => 'Mem4', 'email' => 'user4@mail.com',
                    'phone' => '70000000000', 'department' => 'CSE', 'checkbox' => '0','nameOfThesis' => null, 'descriptionOfThesis' => null],

                ['name' => 'User5', 'lastname' => 'Mem1', 'email' => 'user5@mail.com',
                    'phone' => '70000000000', 'department' => 'RCSE', 'checkbox' => '1', 'nameOfThesis' => 'Аллилуйя', 'descriptionOfThesis' => 'Иииииииииииии'],

                ['name' => 'User6', 'lastname' => 'Mem1', 'email' => 'user6@mail.com',
                    'phone' => '70000000000', 'department' => 'RCSE', 'checkbox' => '0','nameOfThesis' => null, 'descriptionOfThesis' => null]
            ]
        );
    }
}
