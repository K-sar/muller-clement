<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasSlug;


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function getSliderPicturesAttribute(){
        return $this->pictures->filter(function($picture){
            return $picture->slider > 0;
        }
        )->sortBy('slider')->take(5);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    protected $fillable=['name', 'access', 'ordre'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
