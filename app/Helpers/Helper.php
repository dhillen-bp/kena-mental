<?php

namespace App\Helpers;

class Helper
{
    public static function generateCustomId($prefix, $latestId, $initialValue)
    {
        // $latestModel = $modelClass::latest('id')->first();
        if ($latestId) {
            $lastCustomId = intval(substr($latestId, strlen($prefix)));
            return $prefix . str_pad(($lastCustomId + 1), 3, '0', STR_PAD_LEFT);
        } else {
            return $prefix . $initialValue;
        }
    }
}
