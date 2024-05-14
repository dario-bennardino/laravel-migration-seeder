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
        dump($new_train);
    }
}
