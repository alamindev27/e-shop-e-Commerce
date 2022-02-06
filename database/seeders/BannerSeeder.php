<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'offer_text' =>'UP TO 50% OFF',
            'banner_heading' => 'Shirt For Man',
            'sort_description' => 'Maboriosam in a nesciung eget magnae
            dapibus disting tloctio in the find it pereri
            odiy maboriosm',
            'banner_image' => 'default-banner-image.png'
        ]);
    }
}
