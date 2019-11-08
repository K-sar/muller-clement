<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xp extends Model
{
    protected $fillable=['type', 'title', 'content', 'from', 'to', 'link'];
}
