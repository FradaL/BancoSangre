<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.    public function run()
    {
    //
    $sequence = DB::getSequence();

    DB::table('users')->insert([
    'id' => $sequence->nextValue('users_secuence'),
    'name' => 'Daniel',
    'lastname' => 'Lara',
    'email' => 'danilinlara@gmail.com',
    'password' => bcrypt('secret'),
    ''
    ]);
    }
     *
     * @return void
     */
    public function run()
    {
        //
        $sequence = DB::getSequence();

        DB::table('users')->insert([
            'id' => $sequence->nextValue('users_id_seq'),
            'name' => 'Daniel',
            'lastname' => 'Lara',
            'email' => 'danilinlara@gmail.com',
            'password' => bcrypt('secret'),
            'created_at' => '2016-04-19 08:02:03',
            'updated_at' => '2016-04-19 08:02:03'
        ]);
    }
}
