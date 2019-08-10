<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    protected $fillable=["nom", "description", "link", "miniature", "ordre"];
    public $timestamps = false;
}
