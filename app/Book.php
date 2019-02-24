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
        'title', 'publication_date', 'description', 'pages', 'author_id'
    ];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
