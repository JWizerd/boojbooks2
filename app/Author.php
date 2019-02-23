<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * ========================================================
     * Model should define which attributes should be mass assigned
     * ========================================================
     */
    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
