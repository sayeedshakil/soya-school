<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeatureBox extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'feature_title','feature_image','feature_subtitle1','feature_subtitle2','feature_subtitle3','feature_subtitle_link1','feature_subtitle_link2','feature_subtitle_link3','is_active',
    ];
}
