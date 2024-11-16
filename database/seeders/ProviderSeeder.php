<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = [
            [
                'name' => 'ASIAGAMING',
                'categories' => ['FH', 'LC', 'SB', 'SL'],
                'code' => 'AG',
                'slug' => 'asiagaming',
                'image' => 'asiagaming.png'
            ],
            [
                'name' => 'DREAM GAMING',
                'categories' => ['APP', 'LC'],
                'code' => 'DG',
                'slug' => 'dream-gaming',
                'image' => 'dreamgaming.png'
            ],
            [
                'name' => 'LIVE22 SLOTMAKER',
                'categories' => ['SL'],
                'code' => 'L1',
                'slug' => 'live22-slotmaker',
                'image' => 'live22slotmaker.png'
            ],
            [
                'name' => 'ON CASINO',
                'categories' => ['LC'],
                'code' => 'OC',
                'slug' => 'on-casino',
                'image' => 'oncasino.png'
            ],
            [
                'name' => 'PGSOFT',
                'categories' => ['SL'],
                'code' => 'PG',
                'slug' => 'pgsoft',
                'image' => 'pgsoft.png'
            ],
            [
                'name' => 'WBET',
                'categories' => ['SB', 'TN'],
                'code' => 'WB',
                'slug' => 'wbet',
                'image' => 'wbet.png'
            ],
            [
                'name' => 'CREATIVE GAMING',
                'categories' => ['FH', 'OT', 'SL'],
                'code' => 'CG',
                'slug' => 'creative-gaming',
                'image' => 'creativegaming.png'
            ],
            [
                'name' => 'AI LIVE CASINO',
                'categories' => ['OT'],
                'code' => 'RL',
                'slug' => 'ai-live-casino',
                'image' => 'ailivecasino.png'
            ],
            [
                'name' => 'PLAY N GO',
                'categories' => ['SL'],
                'code' => 'PN',
                'slug' => 'play-n-go',
                'image' => 'playngo.png'
            ],
            [
                'name' => 'HABANERO',
                'categories' => ['SL'],
                'code' => 'HB',
                'slug' => 'habanero',
                'image' => 'habanero.png'
            ],
            [
                'name' => 'FA CHAI',
                'categories' => ['CB', 'FH', 'OT', 'SL'],
                'code' => 'FC',
                'slug' => 'fa-chai',
                'image' => 'fachai.png'
            ],
            [
                'name' => 'EVOLUTION',
                'categories' => ['LC', 'SL'],
                'code' => 'GE',
                'slug' => 'evolution',
                'image' => 'evolution.png'
            ],
            [
                'name' => 'FB SPORT',
                'categories' => ['SB'],
                'code' => 'FB',
                'slug' => 'fb-sport',
                'image' => 'fbsport.png'
            ],
            [
                'name' => 'CQ9',
                'categories' => ['SL'],
                'code' => 'CQ',
                'slug' => 'cq9',
                'image' => 'cq9.png'
            ],
            [
                'name' => 'IBC',
                'categories' => ['DEMO', 'ES', 'SB', 'SL'],
                'code' => 'IB',
                'slug' => 'ibc',
                'image' => 'ibc.png'
            ],
            [
                'name' => 'ABS4D',
                'categories' => ['LK', 'SB', 'SL'],
                'code' => 'AZ',
                'slug' => 'abs4d',
                'image' => 'abs4d.png'
            ],
            [
                'name' => 'JDB',
                'categories' => ['CB', 'FH', 'LK', 'OT', 'SL'],
                'code' => 'JD',
                'slug' => 'jdb',
                'image' => 'jdb.png'
            ]
        ];
        

        foreach ($providers as $providerData) {
            $provider = Provider::create([
                'provider_name' => $providerData['name'],
                'provider_code' => $providerData['code'],
                'provider_slug' => Str::slug($providerData['name']),
                'provider_image' => $providerData['image']
            ]);

            $categorySlugs = $providerData['categories'];
            $categories = Category::whereIn('category_code', array_map('strtolower', $categorySlugs))->get();
            $provider->categories()->attach($categories);
        }
    }
}
