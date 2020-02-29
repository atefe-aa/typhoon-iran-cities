<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SaliBhdr\TyphoonIranCities\HasStatusField;

class County extends Model
{
    use HasStatusField;

    protected $fillable = ['province_id', 'name'];

    /**
     * County belongs to province
     */
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    /**
     * County has many cities
     */
    public function cities()
    {
        return $this->hasMany(City::class, 'county_id');
    }
}
