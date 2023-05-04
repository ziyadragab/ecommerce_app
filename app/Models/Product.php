<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,HasSlug;
    const PATH='Images/product';
    protected $fillable=['name','slug','image','description','price','category_id'];

    public function getImageAttribute($value){
      return   $this::PATH.DIRECTORY_SEPARATOR.$value;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
       /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}