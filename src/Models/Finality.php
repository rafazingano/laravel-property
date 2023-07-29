<?php

namespace ConfrariaWeb\Property\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Finality extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'property_finalities';

    protected $fillable = ['status', 'name', 'slug'];

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}
