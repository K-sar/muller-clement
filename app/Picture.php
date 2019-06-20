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
        $tags = array_filter(
            array_unique(
                array_map(
                    function ($item)
                    {
                        return trim($item);
                    }, explode(',', $tags)
                )
            ), function ($item)
            {
                 return !empty($item);
            }
        );

        if (empty($tags))
        {
            return false;
        }

        $persisted_tags = Tag::whereIn('name', $tags)->get();

        $tags_to_create = array_diff($tags, $persisted_tags->pluck('name')->all());
        $tags_to_create = array_map(function ($tag)
        {
            return ['name' => $tag];
        }, $tags_to_create);

        $created_tags = $this->tags()->createMany($tags_to_create);
        $persisted_tags = $persisted_tags->merge($created_tags);
        $this->tags()->sync($persisted_tags);
    }
}
