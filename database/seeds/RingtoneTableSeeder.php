<?php

use Illuminate\Database\Seeder;

class RingtoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Ringtone::class, 50)->create();
    }
}
