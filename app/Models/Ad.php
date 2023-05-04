<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    const PATH='Images/ad';
    protected $fillable=['name','image'];

    public function getImageAttribute($value){
      return  $this::PATH.DIRECTORY_SEPARATOR.$value;
    }
}