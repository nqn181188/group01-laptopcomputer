<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    //mô hình mass assignment
    protected $fillable = ['name','price','quantity','featured','image','brand_id','model',
                            'description','cpu','cputype','amountofram','typeofram','screensize','gcard',
                            'hdtype','hdcapacity','width','depth','height','weight','os','releaseyear'];
}
