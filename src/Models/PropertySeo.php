<?php

namespace ConfrariaWeb\Property\Models;

use Illuminate\Database\Eloquent\Model;

class PropertySeo extends Model
{
    protected $table = 'property_seo';

    protected $fillable = [
        'property_id',
        'title',
        'description',
        'keywords',
        'canonical_url',
        'meta_tags',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
