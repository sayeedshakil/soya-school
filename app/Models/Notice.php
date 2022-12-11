<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['title','description','attachment','studentclass_id','category_id','is_active'];

    public function studentclass(){
        return $this->belongsTo(Studentclass::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
