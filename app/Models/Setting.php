<?php

namespace App\Models;

use App\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Traits\Tappable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Setting.
 *
 * @package namespace App\Models;
 */
class Setting extends Model implements Transformable
{
    use TransformableTrait, HasFactory, HasUuids, Tappable;

    public const
        STORE_ID = 'store_id',
        SELLER_ID = 'seller_id',
        CLIENT_ID = 'client_id',
        CLIENT_SECRET = 'client_secret',
        ACCESS_TOKEN = 'access_token',
        IS_CONNECTED = 'is_connected',
        CREATED_AT = 'created_at',
        UPDATED_AT = 'updated_at';

    public
        $incrementing = false,
        $timestamps = true;

    protected
        $table = 'settings',
        $keyType = 'string',
        $fillable = [
        self::STORE_ID,
        self::SELLER_ID,
        self::CLIENT_ID,
        self::CLIENT_SECRET,
        self::ACCESS_TOKEN,
        self::IS_CONNECTED
    ],
        $casts = [
        self::ACCESS_TOKEN => 'array',
        self::IS_CONNECTED => 'boolean',
        self::CREATED_AT => 'datetime:Y-m-d H:i:s',
        self::UPDATED_AT => 'datetime:Y-m-d H:i:s'
    ],
        $attributes = [
        self::IS_CONNECTED => false
    ];

    public function storeId(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->{self::STORE_ID});
    }

    public function sellerId(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->{self::SELLER_ID});
    }

    public function clientId(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->{self::CLIENT_ID});
    }

    public function clientSecret(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->{self::CLIENT_SECRET});
    }

    public function accessToken(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->{self::ACCESS_TOKEN});
    }
}
