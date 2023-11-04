<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Carp;
use App\Models\CategoriesCarp;

class CarpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carp::create([
            'carp_code' => 'CARP00089',
            'initiator_id' => 1,
            'recipient_id' => 13,
            'verified_by' => 1,
            'due_date' => '20211215',
            'effectiveness' => NULL,
            'status_date' => '20211115',
            'stage' => 'Open',
            'status' => 'Open',
        ]);

        CategoriesCarp::create([
            'carp_id' => 1,
            'category_id' => 1
        ]);
        CategoriesCarp::create([
            'carp_id' => 1,
            'category_id' => 2
        ]);
    }
}
