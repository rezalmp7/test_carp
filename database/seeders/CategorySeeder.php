<?php

namespace Database\Seeders;

use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([ 'name' => 'internal audit findings' ]);
        Category::create([ 'name' => 'non conformity']);
        Category::create([ 'name' => 'oportunity for improvement']);
        Category::create([ 'name' => 'external complain']);
        Category::create([ 'name' => 'safety non compliance']);
        Category::create([ 'name' => 'internal complain']);
        Category::create([ 'name' => 'kpi bsc monitoring']);
        Category::create([ 'name' => 'safety non compliance']);
        Category::create([ 'name' => 'external complain']);
        Category::create([ 'name' => 'oportunity for improvement']);
    }
}
