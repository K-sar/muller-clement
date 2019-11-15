<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Xp extends Model
{
    protected $fillable=['year', 'publish', 'exp_title', 'exp_details_1', 'exp_details_2', 'exp_content', 'exp_link', 'for_title', 'for_details_1', 'for_details_2', 'for_content', 'for_link'];
}
