# Számalk Backend 2025.10.15

git:

### repo létrehozása majd

```Shell
git init
git remote add origin https://github.com/gombiiiiii/summary_20251015.git
git branch -M main
```

### Projekt létrehozása

```Shell
composer create-project laravel/laravel summary_project
```

### xamp indítás és adatbázis létrehozás

értelem szerűen hozd létre

### .env szerkesztése

23-28.-ik sor szerkesztése

### táblák létrehozása

**SORREND FONTOS!!**
haladjunk jobbról balra

legyél mindig a projektben az utasítások kiadásakor:

```Shell
cd summary_project
```

első tábla

```Shell
php artisan make:model Airline -a --api
```

második tábla

```Shell
php artisan make:model Flight -a --api
```

harmadik tábla

```Shell
php artisan make:model Travel -a --api
```

### App/models-be

travel-be

```php
  protected $fillable = [
        'name',
        'email',
        'password',
    ];
```

### database/factori-be

travel-be

```php
 return [
            'evaluation' => fake()->sentence(),
            'flight_id' => Flight::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
```

### database/migrations-be

travel-be

```php
        Schema::create('travel', function (Blueprint $table) {
            $table->id();
            $table->string('evaluation')->default('foglalva');
            $table->foreignId('flight_id')->constrained('flights');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
```

### database/seeder-be

travel-be

```php
<?php

namespace Database\Seeders;

use App\Models\Travel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;


    public function run(): void
    {
        // User::factory(10)->create();
        User::factory(10)->create();
        Travel::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

```

### App/models-be

Flight-ba

```php
    use HasFactory;
        protected $fillable = [
        'date',
        'airline_id',
        'limit',
    ];
```

### database/migrations-be

Flights-ba

```php
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
```

### App/models-be

Airline-ba

```php
    use HasFactory;
    protected $fillable = [
        'name',
        'country',
    ];
```

### database/migrations-be

Airlines-ba

```php
    public function up(): void
    {
        Schema::create('airlines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->timestamps();
        });

        Airline::create([
            'name' => 'Ryanair',
            'country' => 'Spain',
        ]);
        Airline::create([
            'name' => 'Wizz Air',
            'country' => 'Hungary',
        ]);
    }
```

## utánna

```Shell
php artisan migrate
```

```Shell
php artisan migrate:fresh --seed
```
