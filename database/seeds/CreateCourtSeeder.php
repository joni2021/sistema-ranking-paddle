<?php

use Illuminate\Database\Seeder;

class CreateCourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(\App\Models\Court::class, 6)->create();
    }
}
