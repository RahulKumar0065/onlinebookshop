<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
     protected $fillable=['qty','book_id','customer_id','order_id','status'];
}
