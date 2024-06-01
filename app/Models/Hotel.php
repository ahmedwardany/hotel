<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'city_id', 'price_per_night'];


    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function scopeWithName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        }
        return $query;
    }

    public function scopeWithCountryCode(Builder $query, $countryCode)
    {
        if ($countryCode) {
            return $query->whereHas('city', function ($q) use ($countryCode) {
                $q->where('country_code', $countryCode);
            });
        }
        return $query;
    }

    public function scopeWithCityName(Builder $query, $cityName)
    {
        if ($cityName) {
            return $query->whereHas('city', function ($q) use ($cityName) {
                $q->where('name', 'like', '%' . $cityName . '%');
            });
        }
        return $query;
    }

    public function scopeWithPricePerNight(Builder $query, $pricePerNight)
    {
        if ($pricePerNight) {
            return $query->where('price_per_night', $pricePerNight);
        }
        return $query;
    }
}
