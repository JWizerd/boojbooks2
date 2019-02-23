<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * ========================================================
     * Model should define which attributes should be mass assigned, hidden etc.
     * ========================================================
     */

    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
