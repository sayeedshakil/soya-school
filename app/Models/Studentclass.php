<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Studentclass extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    public function students(){
        return $this->hasMany(Student::class);
    }
    public function notices(){
        return $this->hasMany(Notice::class);
    }
}
