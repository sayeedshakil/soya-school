<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['studentId','fName','lName','admissionNumber','admissionDate','studentImage','gender','rollNumber','dateOfBirth','religion','address','mobile','email','fatherName','fatherMobile','fatherOccupation','motherName','motherMobile','motherOccupation','studentclass_id','motherMobile',];


    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $model->studentId = $model->lName.'-'.str_pad($model->withTrashed()->max('id')+1, 5,'11000', STR_PAD_LEFT);
        });

        static::creating(function($adnumber){
            $adnumber->admissionNumber = str_pad($adnumber->withTrashed()->max('id')+1, 5,'41000', STR_PAD_LEFT);
        });
    }

    public function studentclass(){
        return $this->belongsTo(Studentclass::class);
    }


}
