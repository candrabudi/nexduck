<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Crypt;

class AesEncryptionHelper
{
    // Encrypt the user ID
    public static function encryptUserId($userId)
    {
        return Crypt::encryptString($userId);
    }

    // Decrypt the user ID
    public static function decryptUserId($encryptedUserId)
    {
        return Crypt::decryptString($encryptedUserId);
    }
}
