<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class SettingsHelper
{
    /**
     * Mengambil nilai dari tabel settings berdasarkan key tertentu.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function getSetting()
    {
        $setting = DB::table('settings')
            ->first();

        return $setting;
    }
}
