<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //qui inserisco la logica per popolare la tabella

        //creo una nuova istanza di train
        $new_train = new Train();
        $new_train->company = 'Trenitalia';
        $new_train->slug = 'Trenitalia';
        $new_train->departure_station = 'roma';
        $new_train->arrival_station = 'napoli';
        $new_train->departure_time = '2024-05-19 10:00:00';
        $new_train->arrival_time = '2024-05-19 11:00:00';
        $new_train->train_code = 'AB121';
        $new_train->wagons_number = 3;
        $new_train->on_time = true;
        $new_train->cancelled = false;

        //effettuo l'insert nell'db
        $new_train->save();


        // dump($new_train);
    }
}
