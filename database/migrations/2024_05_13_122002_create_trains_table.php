<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\SerializableClosure\UnsignedSerializableClosure;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('company', 40);
            $table->string('departure_station', 50);
            $table->string('arrival_station', 50);
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->mediumInteger('train_code')->unsigned();
            $table->tinyInteger('carriage_number');
            $table->boolean('is_on_time')->default(true);
            $table->tinyInteger('delay')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
