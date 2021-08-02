<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    //mô hình mass assignment
    protected $fillable = ['ordernumber','cust_id','order_date','firstname','lastname',
                            'email','phone','address','status'];
}
