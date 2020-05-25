<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Hotel::class, 50)->create();
        factory(App\ObjectifStrategique::class, 10)->create();
        factory(App\Exercice::class, 2)->create();
        factory(App\ObjectifStrategique::class, 10)->create();
        factory(App\ObjectifSpecifique::class, 10)->create();
        factory(App\SourceFinancement::class, 10)->create();
        factory(App\Direction::class, 10)->create();
        factory(App\Activite::class, 10)->create();

        factory(App\Trimestre::class, 4)->create();
        factory(App\Indicateur::class, 1)->create();
        factory(App\ResultatAttendu::class, 1)->create();
       // factory(App\ActiviteSourceFinancement::class, 1)->create();
    }
}
