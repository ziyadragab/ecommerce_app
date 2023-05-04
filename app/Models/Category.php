<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const PATH='Images/category';
    protected $fillable=['name','slug','image'];

    public function getImageAttribute($value){
       return $this::PATH.DIRECTORY_SEPARATOR.$value;
    }
}