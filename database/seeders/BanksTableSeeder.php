<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            // Bank
            [
                'bank_code' => '002',
                'bank_name' => 'Bank Rakyat Indonesia (BRI)',
                'bank_image' => 'bri.png',
                'bank_type' => 'bank',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => '013',
                'bank_name' => 'Bank Permata',
                'bank_image' => 'permatabank.png',
                'bank_type' => 'bank',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => '022',
                'bank_name' => 'CIMB Niaga',
                'bank_image' => 'cimb_niaga.png',
                'bank_type' => 'bank',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => '028',
                'bank_name' => 'Bank OCBC NISP',
                'bank_image' => 'ocbc_nisp.png',
                'bank_type' => 'bank',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => '026',
                'bank_name' => 'Bank Panin',
                'bank_image' => 'paninbank.png',
                'bank_type' => 'bank',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => '045',
                'bank_name' => 'Bank BTPN',
                'bank_image' => 'btpn.png',
                'bank_type' => 'bank',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => '451',
                'bank_name' => 'Bank Syariah Indonesia (BSI)',
                'bank_image' => 'bsi.png',
                'bank_type' => 'bank',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // E-Wallet
            [
                'bank_code' => 'ew005',
                'bank_name' => 'ShopeePay',
                'bank_image' => 'shopeepay.png',
                'bank_type' => 'ewallet',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => 'ew006',
                'bank_name' => 'Jenius Pay',
                'bank_image' => 'jenius.png',
                'bank_type' => 'ewallet',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Pulsa
            [
                'bank_code' => 'pl002',
                'bank_name' => 'Indosat Pulsa',
                'bank_image' => 'indosat.png',
                'bank_type' => 'pulsa',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => 'pl003',
                'bank_name' => 'XL Pulsa',
                'bank_image' => 'xl.png',
                'bank_type' => 'pulsa',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => 'pl004',
                'bank_name' => '3 (Tri) Pulsa',
                'bank_image' => 'tri.png',
                'bank_type' => 'pulsa',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => 'pl005',
                'bank_name' => 'Smartfren Pulsa',
                'bank_image' => 'smartfren.png',
                'bank_type' => 'pulsa',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // QRIS
            [
                'bank_code' => 'qr003',
                'bank_name' => 'QRIS Bank Mandiri',
                'bank_image' => 'qris_mandiri.png',
                'bank_type' => 'qris',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => 'qr004',
                'bank_name' => 'QRIS BCA',
                'bank_image' => 'qris_bca.png',
                'bank_type' => 'qris',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_code' => 'qr005',
                'bank_name' => 'QRIS OVO',
                'bank_image' => 'qris_ovo.png',
                'bank_type' => 'qris_auto',
                'bank_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
