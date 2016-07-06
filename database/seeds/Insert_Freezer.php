<?php

use Illuminate\Database\Seeder;

class Insert_Freezer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sequence = DB::getSequence();

        DB::table('freezers')->insert([
            'id' => $sequence->nextValue('freezers_id_seq'),
            'name' => 'Freezer A',
            'address' => 'Miami',
            'WareHouse_id' => '1',
            'status_delete' => 'Activo',
            'created_at' => '2016-06-9 08:02:03',
            'updated_at' => '2016-06-9 08:02:03'
        ]);
    }

}
