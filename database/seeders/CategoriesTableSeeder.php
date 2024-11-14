<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Slot',
                'category_slug' => Str::slug('Slot'),
                'category_desktop_image' => 'slot_desktop.png',
                'category_mobile_image' => 'slot_mobile.png',
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Casino',
                'category_slug' => Str::slug('Casino'),
                'category_desktop_image' => 'casino_desktop.png',
                'category_mobile_image' => 'casino_mobile.png',
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Sportsbook',
                'category_slug' => Str::slug('Sportsbook'),
                'category_desktop_image' => 'sportsbook_desktop.png',
                'category_mobile_image' => 'sportsbook_mobile.png',
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Esports',
                'category_slug' => Str::slug('Esports'),
                'category_desktop_image' => 'esports_desktop.png',
                'category_mobile_image' => 'esports_mobile.png',
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Togel',
                'category_slug' => Str::slug('Togel'),
                'category_desktop_image' => 'togel_desktop.png',
                'category_mobile_image' => 'togel_mobile.png',
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
