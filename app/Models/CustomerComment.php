<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerComment extends Model
{
    use HasFactory;
    protected $table = 'customer_comments';
    //mô hình mass assignment
    protected $fillable = ['cust_id','product_id','comment','rate'];
}
