<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_setting_text',
        'about_app',
        'phone',
        'email',
        'facebook',
        'twiter',
        'youtube',
        'whats_up',

    ];


}
