<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Car extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['category_id','carTitle','description','published','price','image'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
