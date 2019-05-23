<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    protected $fillable=['folder_id', 'access', 'link', 'name', 'info', 'alternative', 'slug'];
}
