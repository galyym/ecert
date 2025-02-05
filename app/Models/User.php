<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @mixin Builder
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        "is_bot",
        "first_name",
        "last_name",
        "username",
        "language_code",
        "is_premium",
        "added_to_attachment_menu",
        "created_at",
        "updated_at",
        "iin_bin",
        "phone_number",
        "sales_reps_id",
    ];

    protected $table = 'user';

    public static function updateIinPhoneNumber($userId, $iinBin, $phoneNumber, $salesRepsId)
    {
        return self::where('id', $userId)->update([
            'iin_bin' => $iinBin,
            'phone_number' => $phoneNumber,
            'sales_reps_id' => $salesRepsId
        ]);
    }

    public static function getUserByPhoneNumber($phoneNumber)
    {
        return self::where('phone_number', $phoneNumber)->first();
    }

    public static function getUserByIinBin($iinBin) {
        return self::where('iin_bin', $iinBin)->first();
    }

    public static function getLocale($userId)
    {
        return self::where('id', $userId)->first()?->language_code;
    }

    public function salesRep()
    {
        return $this->belongsTo(SalesRep::class, 'sales_reps_id');
    }

    public static function checkUser($userId)
    {
        return self::where('id', $userId)
            ->whereNotNull('iin_bin')
            ->whereNotNull('phone_number')
            ->whereNotNull('sales_reps_id')
            ->first();
    }
}
