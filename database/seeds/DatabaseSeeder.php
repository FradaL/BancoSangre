<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        $this->call(table_config::class);
        $this->call(CreateBloodTypes::class);
        $this->call(CreateDonors::class);
        $this->call(Insert_warehouse::class);
        $this->call(Insert_Freezer::class);
        $this->call(users::class);

        Model::reguard();
    }
}
