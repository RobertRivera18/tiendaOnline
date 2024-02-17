<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable=['name','slug','image','icon'];
    use HasFactory;

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    public function products(){
        return $this->hasManyThrough(Product::class,Subcategory::class);
    }

    //Ruta amigable
    public function getRouteKeyName(){
        return 'slug';
    }
    
}
