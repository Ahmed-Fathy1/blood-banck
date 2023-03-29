<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'age',
        'hospital_name',
        'hospital_address',
        'bags_num',
        'latitude',
        'client_id',
        'blood_type_id',
        'city_id',
        'latitude',
        'longitude',
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function notification()
    {
        return $this->belongsTo('App\Models\Notification');
    }

}
