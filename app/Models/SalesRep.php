<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


/**
 * @mixin Builder
 */
class SalesRep extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "surname",
        "phone_number",
        "email",
        "iin_bin",
        "address",
        "created_at",
        "updated_at",
        "qr_code_path"
    ];

    public static function getSalesRep($id)
    {
        return self::find($id)->first();
    }

    public static function booted()
    {
        static::created(function ($user) {
            $qrCode = QrCode::format('png')->size(200)->generate(base64_encode($user->id));

            $path = 'qrcodes/' . $user->id . '.png';
            Storage::disk('public')->put($path, $qrCode);

            $user->qr_code_path = $path;
            $user->save();
        });
    }

    public function users()
    {
        return $this->hasMany(User::class, 'sales_reps_id', 'id');
    }
}
