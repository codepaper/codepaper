<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Tag extends Model
{
    protected $fillable = ['title'];

    public function articles()
    {
    	return $this->belongsToMany(Article::class);
    }

    /**
     * Get count of articles related to the tag
     *
     * @return integer
     */
    public function getArticlesCount()
    {
       return $this->articles()->count();
    }
}
