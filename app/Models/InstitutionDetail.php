<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstitutionDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'aboutus_title',
        'aboutus_image',
        'aboutus_description',
        'contactus_school_name',
        'contactus_address',
        'contactus_mobile',
        'contactus_telephone',
        'contactus_email',
        'is_active',
    ];
}
