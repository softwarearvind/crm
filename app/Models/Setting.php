<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'logo',
        'email',
        'phone',
        'address',
        'footer_text',
        'meta_title',
        'meta_description',
        'facebook',
        'twitter',
        'instagram',
    ];
}
