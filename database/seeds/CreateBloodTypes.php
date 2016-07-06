<?php

use Illuminate\Database\Seeder;

class CreateBloodTypes extends Seeder
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

        DB::table('BloodTypes')->insert([
            'id' => $sequence->nextValue('BloodTypes_id_seq'),
            'name' => 'O+',
            'reservation' => '5',
            'created_at' => '2016-06-9 08:02:03',
            'updated_at' => '2016-06-9 08:02:03'
        ]);
        DB::table('BloodTypes')->insert([
            'id' => $sequence->nextValue('BloodTypes_id_seq'),
            'name' => 'O-',
            'reservation' => '5',
            'created_at' => '2016-06-9 08:02:03',
            'updated_at' => '2016-06-9 08:02:03'
        ]);
        DB::table('BloodTypes')->insert([
            'id' => $sequence->nextValue('BloodTypes_id_seq'),
            'name' => 'A+',
            'reservation' => '5',
            'created_at' => '2016-06-9 08:02:03',
            'updated_at' => '2016-06-9 08:02:03'
        ]);
        DB::table('BloodTypes')->insert([
            'id' => $sequence->nextValue('BloodTypes_id_seq'),
            'name' => 'A-',
            'reservation' => '5',
            'created_at' => '2016-06-9 08:02:03',
            'updated_at' => '2016-06-9 08:02:03'
        ]);
        DB::table('BloodTypes')->insert([
            'id' => $sequence->nextValue('BloodTypes_id_seq'),
            'name' => 'B+',
            'reservation' => '5',
            'created_at' => '2016-06-9 08:02:03',
            'updated_at' => '2016-06-9 08:02:03'
        ]);
        DB::table('BloodTypes')->insert([
            'id' => $sequence->nextValue('BloodTypes_id_seq'),
            'name' => 'B-',
            'reservation' => '5',
            'created_at' => '2016-06-9 08:02:03',
            'updated_at' => '2016-06-9 08:02:03'
        ]);
        DB::table('BloodTypes')->insert([
            'id' => $sequence->nextValue('BloodTypes_id_seq'),
            'name' => 'AB+',
            'reservation' => '8',
            'created_at' => '2016-06-9 08:02:03',
            'updated_at' => '2016-06-9 08:02:03'
        ]);
        DB::table('BloodTypes')->insert([
            'id' => $sequence->nextValue('BloodTypes_id_seq'),
            'name' => 'AB-',
            'reservation' => '5',
            'created_at' => '2016-06-9 08:02:03',
            'updated_at' => '2016-06-9 08:02:03'
        ]);
    }
}
