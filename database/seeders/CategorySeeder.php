<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Fishing', 'code' => 'fh'],
            ['name' => 'Live Casino', 'code' => 'lc'],
            ['name' => 'Sports Betting', 'code' => 'sb'],
            ['name' => 'Slot Games', 'code' => 'sl'],
            ['name' => 'App Gaming', 'code' => 'app'],
            ['name' => 'Other Games', 'code' => 'ot'],
            ['name' => 'Card Betting', 'code' => 'cb'],
            ['name' => 'Tennis', 'code' => 'tn'],
            ['name' => 'Demo Games', 'code' => 'demo'],
            ['name' => 'E-Sports', 'code' => 'es'],
            ['name' => 'Lottery', 'code' => 'lk'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category['name'],
                'category_code' => $category['code'],
                'category_slug' => Str::slug($category['name']),
            ]);
        }
    }
}
