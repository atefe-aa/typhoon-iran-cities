<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use SaliBhdr\TyphoonIranCities\Traits\HasStatusField;

/**
 * Class IranCity (Shahr)
 * @package App
 */
class IranCity extends Model
{
    use HasStatusField;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * city belongs to a province
     */
    public function province()
    {
        return $this->belongsTo(IranProvince::class);
    }

    /**
     * city belongs to a county
     */
    public function county()
    {
        return $this->belongsTo(IranCounty::class);
    }

    /**
     * city belongs to a county
     */
    public function sector()
    {
        return $this->belongsTo(IranSector::class);
    }

    /**
     * city has many districts
     */
    public function districts()
    {
        return $this->hasMany(IranCityDistrict::class);
    }

    /**
     * @return IranProvince
     */
    public function getProvince()
    {
        return $this->province()->first();
    }

    /**
     * @return IranCounty
     */
    public function getCounty()
    {
        return $this->county()->first();
    }

    /**
     * @return IranSector
     */
    public function getSector()
    {
        return $this->sector()->first();
    }

    /**
     * @return IranCityDistrict[]|Collection
     */
    public function getDistricts()
    {
        return $this->districts()->get();
    }

    /**
     * @return IranCityDistrict[]|Collection
     */
    public function getActiveDistricts()
    {
        return $this->districts()->active()->get();
    }

    /**
     * @return IranCityDistrict[]|Collection
     */
    public function getNotActiveDistricts()
    {
        return $this->districts()->notActive()->get();
    }
}
