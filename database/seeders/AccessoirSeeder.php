<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accessoir;
use Illuminate\Support\Str;
class AccessoirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accessoir::create([
            'nom' => 'power bank shell 4200ma',
            'description' => Str::random(50),
            'type' => 'power bank',
            'prix' => 400,
            'nbr_produit' => 5,
            'per_solde' => 0,
            'nbr_visite' => 0,
            'admin_id' => 1,
        ]);
        Accessoir::create([
            'nom' => 'casque bluetooth',
            'description' => Str::random(50),
            'type' => 'casque',
            'prix' => 70,
            'nbr_produit' => 10,
            'per_solde' => 59,
            'nbr_visite' => 0,
            'admin_id' => 3,
        ]);
        Accessoir::create([
            'nom' => 'glass Huawei honor 7',
            'description' => Str::random(50),
            'type' => 'Glasse',
            'prix' => 20,
            'nbr_produit' => 5,
            'per_solde' => 0,
            'nbr_visite' => 0,
            'admin_id' => 2,
        ]);

        Accessoir::create([
            'nom' => 'pochette IPhone 6s',
            'description' => Str::random(50),
            'type' => 'pochette',
            'prix' => 999.9,
            'nbr_produit' => 5,
            'per_solde' => 0,
            'nbr_visite' => 0,
            'admin_id' => 3,
        ]);
        Accessoir::create([
            'nom' => 'pochette samsung s9',
            'description' => Str::random(50),
            'type' => 'pochette',
            'prix' => 35,
            'nbr_produit' => 5,
            'per_solde' => 29.99,
            'nbr_visite' => 0,
            'admin_id' => 3,
        ]);
        Accessoir::create([
            'nom' => 'ecouteur Redmi',
            'description' => Str::random(50),
            'type' => 'ecouteur',
            'prix' => 25,
            'nbr_produit' => 5,
            'per_solde' => 19,
            'nbr_visite' => 0,
            'admin_id' => 1,
        ]);   
    }
}
