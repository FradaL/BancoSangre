<?php

use Illuminate\Database\Seeder;

class Insert_warehouse extends Seeder
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

        DB::table('warehouses')->insert([
            'id' => $sequence->nextValue('warehouses_id_seq'),
            'name' => 'Almacen A',
            'address' => 'Miami',
            'status_delete' => 'Activo',
            'created_at' => '2016-06-9 08:02:03',
            'updated_at' => '2016-06-9 08:02:03'
        ]);
    }
}
