<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve the categories by name
        $slotCategoryId = DB::table('categories')->where('category_name', 'Slot')->value('id');
        $casinoCategoryId = DB::table('categories')->where('category_name', 'Casino')->value('id');
        $sportsbookCategoryId = DB::table('categories')->where('category_name', 'Sportsbook')->value('id');
        $esportsCategoryId = DB::table('categories')->where('category_name', 'Esports')->value('id');
        $togelCategoryId = DB::table('categories')->where('category_name', 'Togel')->value('id');

        // Insert top providers for each category
        DB::table('providers')->insert([
            // Slot providers
            [
                'api_credential_id' => 1,
                'category_id' => $slotCategoryId,
                'provider_name' => 'Pragmatic Play',
                'provider_slug' => Str::slug('Pragmatic Play'),
                'provider_position' => 1,
                'provider_image' => 'pragmatic_play.png',
                'provider_icon' => 'pragmatic_play_icon.png',
                'provider_icon_nav' => 'pragmatic_play_icon_nav.png',
                'provider_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'api_credential_id' => 2,
                'category_id' => $slotCategoryId,
                'provider_name' => 'Habanero',
                'provider_slug' => Str::slug('Habanero'),
                'provider_position' => 2,
                'provider_image' => 'habanero.png',
                'provider_icon' => 'habanero_icon.png',
                'provider_icon_nav' => 'habanero_icon_nav.png',
                'provider_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Casino providers
            [
                'api_credential_id' => 3,
                'category_id' => $casinoCategoryId,
                'provider_name' => 'Evolution Gaming',
                'provider_slug' => Str::slug('Evolution Gaming'),
                'provider_position' => 1,
                'provider_image' => 'evolution_gaming.png',
                'provider_icon' => 'evolution_gaming_icon.png',
                'provider_icon_nav' => 'evolution_gaming_icon_nav.png',
                'provider_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'api_credential_id' => 4,
                'category_id' => $casinoCategoryId,
                'provider_name' => 'Ezugi',
                'provider_slug' => Str::slug('Ezugi'),
                'provider_position' => 2,
                'provider_image' => 'ezugi.png',
                'provider_icon' => 'ezugi_icon.png',
                'provider_icon_nav' => 'ezugi_icon_nav.png',
                'provider_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Sportsbook providers
            [
                'api_credential_id' => 5,
                'category_id' => $sportsbookCategoryId,
                'provider_name' => 'SBOBET',
                'provider_slug' => Str::slug('SBOBET'),
                'provider_position' => 1,
                'provider_image' => 'sbobet.png',
                'provider_icon' => 'sbobet_icon.png',
                'provider_icon_nav' => 'sbobet_icon_nav.png',
                'provider_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'api_credential_id' => 6,
                'category_id' => $sportsbookCategoryId,
                'provider_name' => 'IBC Bet',
                'provider_slug' => Str::slug('IBC Bet'),
                'provider_position' => 2,
                'provider_image' => 'ibc_bet.png',
                'provider_icon' => 'ibc_bet_icon.png',
                'provider_icon_nav' => 'ibc_bet_icon_nav.png',
                'provider_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Esports providers
            [
                'api_credential_id' => 7,
                'category_id' => $esportsCategoryId,
                'provider_name' => 'Betway Esports',
                'provider_slug' => Str::slug('Betway Esports'),
                'provider_position' => 1,
                'provider_image' => 'betway_esports.png',
                'provider_icon' => 'betway_esports_icon.png',
                'provider_icon_nav' => 'betway_esports_icon_nav.png',
                'provider_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Togel providers
            [
                'api_credential_id' => 0,
                'category_id' => $togelCategoryId,
                'provider_name' => 'Togel365',
                'provider_slug' => Str::slug('Togel365'),
                'provider_position' => 1,
                'provider_image' => 'togel365.png',
                'provider_icon' => 'togel365_icon.png',
                'provider_icon_nav' => 'togel365_icon_nav.png',
                'provider_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'api_credential_id' => 0,
                'category_id' => $togelCategoryId,
                'provider_name' => 'WLA Togel',
                'provider_slug' => Str::slug('WLA Togel'),
                'provider_position' => 2,
                'provider_image' => 'wla_togel.png',
                'provider_icon' => 'wla_togel_icon.png',
                'provider_icon_nav' => 'wla_togel_icon_nav.png',
                'provider_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
