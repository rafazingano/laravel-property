<?php

namespace ConfrariaWeb\Property\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    protected $table = 'property_details';

    protected $fillable = [
        'property_id',
        'iptu',
        'condo_price',
        'fire_insurance_price',
        'cleaning_fee_price',
        'property_tax_period',
        'financeable',
        'readjustment_index',
        'accepts_tradeins',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
