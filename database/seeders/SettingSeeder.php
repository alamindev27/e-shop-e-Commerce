<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'phone' => '+060 (800) 801-582',
            'email' => 'support@shophub.com',
            'store_location' => 'Bangladesh',
            'header_logo' => 'logo-top.png',
            'footer_logo' => 'logo-footer.png',
            'favicon' => 'favicon.png',
            'footer_description' => 'Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.',
            'office_location' => 'NO. 342 - London Oxford Street.',
            'country' => 'USA',
            'city' => 'Califonia',
            'info_email' => 'info@eshop.com',
            'info_number' => '+032 3456 7890',
            'copyright_text' => 'Copyright © 2022 Alamin - All Rights Reserved.',
            'copyright_link' => 'https://www.freelancermdalamin.com'
        ]);
    }
}
