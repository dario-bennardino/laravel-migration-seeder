<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

// $faker = new Faker();
class TrainTableSeederFaker extends Seeder
{
    /**
     * Run the database seeds.
     */

    //passo una nuova istanza del faker come parametro del metodo run

    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 20; $i++) {
            $new_train = new Train();
            $new_train->company = $faker->words(3, true);
            // $new_train->slug = Str::slug($item['company'], '-');
            $new_train->slug = $this->generateSlug($new_train->company);
            $new_train->departure_station = $faker->city;
            $new_train->arrival_station = $faker->city;
            $new_train->departure_time = $faker->time('H:i:s');
            $new_train->arrival_time = $faker->time('H:i:s');
            $new_train->train_code = $faker->numberBetween(2000, 3000);
            $new_train->wagons_number = $faker->numberBetween(1, 50);
            $new_train->on_time = $faker->boolean();
            $new_train->cancelled = $faker->boolean();
            // dump($new_train);
            $new_train->save();
        }
        //
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
