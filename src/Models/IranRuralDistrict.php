<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use SaliBhdr\TyphoonIranCities\Traits\HasStatusField;

/**
 * Class IranRuralDistrict (Dehestan)
 * @package App
 */
class IranRuralDistrict extends Model
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
     * rural district belongs to a province
     */
    public function province()
    {
        return $this->belongsTo(IranProvince::class);
    }

    /**
     * rural district belongs to a county
     */
    public function county()
    {
        return $this->belongsTo(IranCounty::class);
    }

    /**
     * rural district belongs to a county
     */
    public function sector()
    {
        return $this->belongsTo(IranSector::class);
    }

    /**
     * rural district has many districts
     */
    public function villages()
    {
        return $this->hasMany(IranVillage::class);
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
     * @return IranVillage[]|Collection
     */
    public function getVillages()
    {
        return $this->villages()->get();
    }

    /**
     * @return IranVillage[]|Collection
     */
    public function getActiveVillages()
    {
        return $this->villages()->active()->get();
    }

    /**
     * @return IranVillage[]|Collection
     */
    public function getNotActiveVillages()
    {
        return $this->villages()->notActive()->get();
    }
}
