<?php

namespace ConfrariaWeb\Property\Models;

use ConfrariaWeb\File\Traits\FileTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Property extends Model
{
    use HasFactory, SoftDeletes, FileTrait;

    protected $fillable = [
        'type_id',
        'user_id',
        'code',
        'title',
        'slug',
        'description',
        'featured',
        'status',
    ];

    public function finalities()
    {
        return $this->belongsToMany(Finality::class, 'property_finality', 'property_id', 'finality_id')->withPivot('price');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'property_feature', 'property_id', 'feature_id');
    }

    public function infrastructures()
    {
        return $this->belongsToMany(Infrastructure::class, 'property_infrastructure', 'property_id', 'infrastructure_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function details()
    {
        return $this->hasOne(PropertyDetail::class);
    }

    public function seo()
    {
        return $this->hasOne(PropertySeo::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $file = $this->files()->orderBy('id')->first();
        return Storage::url($file->path);
    }

}
