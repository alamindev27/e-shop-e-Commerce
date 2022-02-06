<?php

namespace Database\Seeders;

use App\Models\AllSize;
use Illuminate\Database\Seeder;

class AllSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allsize = [
            ['size_name' => 'XXXS'],
            ['size_name' => 'XXS'],
            ['size_name' => 'XS'],
            ['size_name' => 'S'],
            ['size_name' => 'M'],
            ['size_name' => 'L'],
            ['size_name' => 'XL'],
            ['size_name' => 'XXL'],
            ['size_name' => 'XXXL'],
        ];
        foreach($allsize as $size){
            AllSize::create($size);
        }
    }
}
