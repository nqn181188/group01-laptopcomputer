<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    //mô hình mass assignment
    protected $fillable = ['ordernumber','product_id','price','quantity','shipfirstname',
                            'shiplastname','shipemail','shipphone','shipaddress'];
    public function product()
    {
         return $this->belongsTo(Product::class);
    }         
}
