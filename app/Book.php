<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author_id', 'publication_date', 'description', 'pages'
    ];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
