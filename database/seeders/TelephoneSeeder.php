<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Telephone;
use Illuminate\Support\Str;
class TelephoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Telephone::create([
            'nom' => 'Samsung S8',
            'description' => Str::random(50),
            'marque' => 'samsung',
            'prix' => 1200.6,
            'nbr_produit' => 5,
            'per_solde' => 0,
            'nbr_visite' => 0,
            'admin_id' => 1,
        ]);
        Telephone::create([
            'nom' => 'Huawei honor 7',
            'description' => Str::random(50),
            'marque' => 'Huawei',
            'prix' => 2200,
            'nbr_produit' => 5,
            'per_solde' => 0,
            'nbr_visite' => 0,
            'admin_id' => 2,
        ]);

        Telephone::create([
            'nom' => 'IPhone 6s',
            'description' => Str::random(50),
            'marque' => 'Iphone',
            'prix' => 999.9,
            'nbr_produit' => 5,
            'per_solde' => 0,
            'nbr_visite' => 0,
            'admin_id' => 1,
        ]);
        Telephone::create([
            'nom' => 'Samsung note 20',
            'description' => Str::random(50),
            'marque' => 'Samsung',
            'prix' => 3500,
            'nbr_produit' => 5,
            'per_solde' => 0,
            'nbr_visite' => 0,
            'admin_id' => 2,
        ]);
        Telephone::create([
            'nom' => 'Redmi not 10Mi',
            'description' => Str::random(50),
            'marque' => 'Redmi',
            'prix' => 2500,
            'nbr_produit' => 5,
            'per_solde' => 0,
            'nbr_visite' => 0,
            'admin_id' => 3,
        ]);   
}
}
