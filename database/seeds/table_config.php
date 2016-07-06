<?php

use Illuminate\Database\Seeder;

class table_config extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        DB::table('configs')->insert([
            'price' => '75',
        ]);
    }
}
