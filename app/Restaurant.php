<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Restaurant extends Model
{
    protected $casts = ['is_published' => 'boolean', 'is_active' => 'boolean', 'is_hidden' => 'boolean',
        'qc_status' => 'boolean'];

    public function setUpdatedAtAttribute($date)
    {
        $this->attributes['updated_at'] = Carbon::parse($date);
    }

    public function setCreatedAtAttribute($date)
    {
        $this->attributes['created_at'] = Carbon::parse($date);
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('m/d/Y');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('m/d/Y');
    }

    public function setBusinessStartTimeAttribute($timestamp)
    {
        if($timestamp) {
            $parts = explode(':', $timestamp);
            $this->attributes['business_start_time'] = intval($parts[0] * 3600 + $parts[1] * 60);
        } else {
            $this->attributes['business_start_time'] = null;
        }
    }

    public function setBusinessEndTimeAttribute($timeStr)
    {
        if($timeStr) {
            $parts = explode(':', $timeStr);
            $this->attributes['business_end_time'] = intval($parts[0]) * 3600 + intval($parts[1]) * 60;
        } else {
            $this->attributes['business_end_time'] = null;
        }
    }

    public function getBusinessStartTimeAttribute($timestamp)
    {
        if($timestamp) {
            if($timestamp >= 3600) {
                $hour = $timestamp/3600;
                $minute = ($timestamp%3600)/60;
            } else {
                $hour = '00';
                $minute = $timestamp/60;
            }
            $hour = $hour . '';
            $minute = $minute . '';
            if(strlen($hour) == 1) {
                $hour = '0' . $hour;
            }

            if(strlen($minute) == 1) {
                $minute = '0' . $minute;
            }
            return $hour . ':' . $minute;
        } else {
            return null;
        }
    }

    public function getBusinessEndTimeAttribute($timestamp)
    {
        if($timestamp) {
            if($timestamp >= 3600) {
                $hour = $timestamp/3600;
                $minute = ($timestamp%3600)/60;
            } else {
                $hour = '00';
                $minute = $timestamp/60;
            }
            $hour = $hour . '';
            $minute = $minute . '';
            if(strlen($hour) == 1) {
                $hour = '0' . $hour;
            }

            if(strlen($minute) == 1) {
                $minute = '0' . $minute;
            }
            return $hour . ':' . $minute;
        } else {
            return null;
        }
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\SubCategory', 'sub_category_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }

    public function state()
    {
        return $this->belongsTo('App\State', 'state_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review', 'restaurant_id');
    }

    public function first_review()
    {
        return $this->hasOne('App\Review', 'restaurant_id')->take(1);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'restaurant_tags');
    }
}
