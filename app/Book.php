<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    protected $fillable=['title','photo','price','pdf','description','category_id,author_id'];


    public function category($value='')
	{
		return $this->belongsTo('App\Category');
	}
	public function author($value='')
	{
		return $this->belongsTo('App\Author');
	}
}
