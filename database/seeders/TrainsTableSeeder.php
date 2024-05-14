<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Illuminate\Support\Str;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //qui inserisco la logica per popolare la tabella
        $data = [
            [
                "company" => 'Trenitalia',
                "slug" => 'Trenitalia',
                "departure_station" => 'roma',
                "arrival_station" => 'napoli',
                "departure_time" => '2024-05-19 10:00:00',
                "arrival_time" => '2024-05-19 11:00:00',
                "train_code" => 'AB111',
                "wagons_number" => 3,
                "on_time" => true,
                "cancelled" => false,
            ],
            [
                "company" => 'Trenitalia',
                "slug" => 'Trenitalia',
                "departure_station" => 'roma',
                "arrival_station" => 'napoli',
                "departure_time" => '2024-05-19 11:00:00',
                "arrival_time" => '2024-05-19 12:00:00',
                "train_code" => 'AB112',
                "wagons_number" => 5,
                "on_time" => true,
                "cancelled" => false,
            ],
            [
                "company" => 'Trenitalia',
                "slug" => 'Trenitalia',
                "departure_station" => 'firenze',
                "arrival_station" => 'bologna',
                "departure_time" => '2024-05-19 15:00:00',
                "arrival_time" => '2024-05-19 16:30:00',
                "train_code" => 'AB113',
                "wagons_number" => 6,
                "on_time" => true,
                "cancelled" => false,
            ],
            [
                "company" => 'Trenitalia',
                "slug" => 'Trenitalia',
                "departure_station" => 'milano',
                "arrival_station" => 'roma',
                "departure_time" => '2024-05-19 10:00:00',
                "arrival_time" => '2024-05-19 13:00:00',
                "train_code" => 'AB114',
                "wagons_number" => 7,
                "on_time" => true,
                "cancelled" => false,
            ],

        ];

        foreach ($data as $item) {
            $new_train = new Train();
            $new_train->company = $item['company'];
            // $new_train->slug = Str::slug($item['company'], '-');
            $new_train->slug = $this->generateSlug($new_train->company);
            $new_train->departure_station = $item['departure_station'];
            $new_train->arrival_station = $item['arrival_station'];
            $new_train->departure_time = $item['departure_time'];
            $new_train->arrival_time = $item['arrival_time'];
            $new_train->train_code = $item['train_code'];
            $new_train->wagons_number = $item['wagons_number'];
            $new_train->on_time = $item['on_time'];
            $new_train->cancelled = $item['cancelled'];
            $new_train->save();

            // dump($new_train);
        }

        //creo una nuova istanza di train
        // $new_train = new Train();
        // $new_train->company = 'Trenitalia';
        // $new_train->slug = 'Trenitalia';
        // $new_train->departure_station = 'roma';
        // $new_train->arrival_station = 'napoli';
        // $new_train->departure_time = '2024-05-19 10:00:00';
        // $new_train->arrival_time = '2024-05-19 11:00:00';
        // $new_train->train_code = 'AB121';
        // $new_train->wagons_number = 3;
        // $new_train->on_time = true;
        // $new_train->cancelled = false;

        // //effettuo l'insert nell'db
        // $new_train->save();


        // dump($new_train);
    }

    private function generateSlug($string)
    {
        /*
            1. ricevo la stringa da "sluggare"
            2. genero lo slug
            3. faccio una query per vedere se lo slug è già presente nel db
            4. se non è presente restituisco lo slug
            5. se è presente ne genero un altro con un valore incrementale e ad ogni generazione verifico che non sia prente
            6. una volta trovato uno slug non presento le restituisco
        */

        //2
        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        //3
        $exixts = Train::where('slug', $slug)->first();
        $c = 1;

        while ($exixts) {
            $slug = $original_slug . '-' . $c;
            $exixts = Train::where('slug', $slug)->first();
            $c++;
        }

        // 5.


        return $slug;
    }
}
