<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Str;
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


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    protected $fillable=["folder_id", 'access', 'link', 'name', 'info', 'alternative'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function saveTags(string $tags)
    {
        $tags = collect(explode(',', $tags));

        $tags = $tags
            ->map(function($tag) { return trim($tag);})
            ->unique()
            ->filter(function ($tag) {
                return !empty($tag);
            });

        if ($tags->isEmpty())
        {
            return false;
        }

        $persisted_tags = Tag::whereIn('name', $tags)->get();

        $tags_to_create =  $tags->diff($persisted_tags->pluck('name')->all())
                                ->map(function ($tag) {return ['name' => $tag];})
                                ->toArray();

        $created_tags = $this->tags()->createMany($tags_to_create);
        $persisted_tags = $persisted_tags->merge($created_tags);
        $this->tags()->sync($persisted_tags);
    }

    public function getTagsAsStringAttribute()
    {
        return $this->tags->implode('name', ', ');
    }
}
