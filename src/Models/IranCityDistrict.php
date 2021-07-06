<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use SaliBhdr\TyphoonIranCities\Traits\HasStatusField;

/**
 * Class IranCityDistrict (Mantaghe Shahri)
 * @package App
 */
class IranCityDistrict extends Model
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
     * city district belongs to a province
     */
    public function province()
    {
        return $this->belongsTo(IranProvince::class);
    }

    /**
     * city district belongs to a county
     */
    public function county()
    {
        return $this->belongsTo(IranCounty::class);
    }

    /**
     * city district belongs to a county
     */
    public function sector()
    {
        return $this->belongsTo(IranSector::class);
    }

    /**
     * city district belongs to a county
     */
    public function city()
    {
        return $this->belongsTo(IranCity::class);
    }

    /**
     * @return self[]|Collection
     */
    public static function getAll()
    {
        return static::all();
    }

    /**
     * @return self[]|Collection
     */
    public static function getAllActive()
    {
        return static::active()->get();
    }

    /**
     * @return self[]|Collection
     */
    public static function getAllNotActive()
    {
        return static::notActive()->get();
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
     * @return IranCity
     */
    public function getCity()
    {
        return $this->city()->first();
    }
}
