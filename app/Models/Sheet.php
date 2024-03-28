<?php

namespace App\Models;

use App\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Traits\Tappable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Sheet.
 *
 * @package namespace App\Models;
 */
class Sheet extends Model implements Transformable
{
    use TransformableTrait, HasFactory, HasUuids, Tappable;

    public const
        STORE_ID = 'store_id',
        NAME = 'name',
        FIELDS = 'fields',
        IS_ACTIVE = 'is_active',
        CREATED_AT = 'created_at',
        UPDATED_AT = 'updated_at';

    public
        $incrementing = false,
        $timestamps = true;

    protected
        $table = 'sheets',
        $keyType = 'string',
        $fillable = [
        self::STORE_ID,
        self::NAME,
        self::FIELDS,
        self::IS_ACTIVE,
    ],
        $casts = [
        self::FIELDS => 'collection',
        self::IS_ACTIVE => 'boolean',
        self::CREATED_AT => 'datetime:Y-m-d H:i:s',
        self::UPDATED_AT => 'datetime:Y-m-d H:i:s'
    ];

    public static function getAvailableFields(): Collection
    {
        return collect([
            'SKU', 'Vendor', 'Total tax', 'Order date', 'First name',
            'Last name', 'Full name', 'Email', 'Phone', 'Country',
            'Region', 'City', 'Address city', 'Address state', 'Address country',
            'Address currency', 'Address zip code', 'Address 1', 'Address 1', 'Address 2',
            'Full address', 'Total charge', 'Total coupon', 'Total shipping fees', 'Payment status',
            'Total discount', 'Total quantity', 'Payment gateway', 'Shipping status', 'Tracking number',
            'Product name', 'Product URL', 'Product variant', 'Variant price', 'Order customer currency',
            'Total with customer currency'
        ]);
    }

    public function storeId(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->{self::STORE_ID});
    }
}
