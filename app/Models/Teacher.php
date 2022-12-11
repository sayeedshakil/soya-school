<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['teacherId','fName','lName','designation','contractType','joinDate','gender','maritalStatus','qualification','religion','address','mobile','email','fatherName','teacherImage','motherName','facebook_link','instagram_link','twitter_link','website_link',];


    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $model->teacherId = $model->lName.'-'.str_pad($model->withTrashed()->max('id')+1, 4,'5500', STR_PAD_LEFT);
        });

        // static::creating(function($adnumber){
        //     $adnumber->admissionNumber = str_pad($adnumber->withTrashed()->max('id')+1, 5,'41100', STR_PAD_LEFT);
        // });
    }
}
