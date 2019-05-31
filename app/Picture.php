<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
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

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    protected $fillable=["folder_id", 'access', 'link', 'name', 'info', 'alternative', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
