<?php

use App\Models\Flight;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->foreignId('airline_id')->constrained('airlines');
            $table->integer('limit')->default(200);
            $table->timestamps();
        });


        Flight::create([
            'date' => '2023-11-20',
            'airline_id' => 1,
            'limit' => 180,
        ]);
        Flight::create([
            'date' => '2024-10-21',
            'airline_id' => 1,
        ]);        
        Flight::create([
            'date' => '2020-05-01',
            'airline_id' => 2,
        ]);     

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
