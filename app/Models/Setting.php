<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable =[
        'phone',
        'email',
        'store_location',
        'header_logo',
        'footer_logo',
        'favicon',
        'footer_description',
        'office_location',
        'country',
        'city',
        'info_email',
        'info_number',
        'copyright_text',
        'copyright_link',
    ];
}
