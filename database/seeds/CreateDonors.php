<?php

use Illuminate\Database\Seeder;

class CreateDonors extends Seeder
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

        DB::table('Donors')->insert([
            'id' => $sequence->nextValue('donors_id_seq'),
            'first_name' => 'O+',
            'second_name' => 'jose',
            'first_lastname' => 'lara',
            'second_lastname' => 'Pereira',
            'phone' => '56333488',
            'email' => 'fdlarafree@gmail.com',
            'dpi' => '12345678902',
            'Civil_Status' => 'Soltero',
            'gender' => 'Masculino',
            'age' => '21',
            'BloodType_id' => '1',
            'weight' => '65',
            'disease' => 'NO',
            'tattoo' => 'NO',
            'Status_Check' => 'Aprobado',
            'created_at' => '2016-06-9 08:02:03',
            'updated_at' => '2016-06-9 08:02:03',
            'Status_Delete' => 'Activo'

        ]);
    }
}
