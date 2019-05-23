<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    protected $fillable=['name','slug','access'];
}
